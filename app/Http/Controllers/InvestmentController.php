<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\BalanceLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class InvestmentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        Log::info('Investment request received', ['request' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:70',
            'plan' => 'required|in:basic,gold,platinum,professional'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }

        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $planKey = $request->input('plan');
        $plan = config("investment_plans.plans.{$planKey}");
        if (!$plan) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid plan selected'
            ], 422);
        }

        if ($request->amount < $plan['minimum_investment']) {
            return response()->json([
                'success' => false,
                'message' => "Minimum investment for {$plan['name']} plan is \${$plan['minimum_investment']}"
            ], 422);
        }

        if ($user->available_balance < $request->amount) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient available balance'
            ], 422);
        }

        if ($user->investments()->where('status', 'active')->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'You already have an active investment'
            ], 422);
        }

        try {
            DB::transaction(function () use ($user, $request, $plan, $planKey) {
                $investment = Investment::create([
                    'user_id' => $user->id,
                    'principal' => $request->amount,
                    'current_amount' => $request->amount,
                    'interest_rate' => ($plan['daily_profit_min'] + $plan['daily_profit_max']) / 2,
                    'plan' => $planKey,
                    'status' => 'active',
                ]);

                $user->decrement('balance', $request->amount);
                $user->increment('locked_balance', $request->amount);

                BalanceLog::create([
                    'user_id' => $user->id,
                    'amount' => $request->amount,
                    'type' => 'investment',
                    'status' => 'completed',
                    'description' => "Investment started, ID: {$investment->id}"
                ]);

                Log::info('Investment created', ['investment_id' => $investment->id]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Investment started successfully'
            ], 201);
        } catch (\Exception $e) {
            Log::error('Failed to create investment', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to create investment'
            ], 500);
        }
    }
}
