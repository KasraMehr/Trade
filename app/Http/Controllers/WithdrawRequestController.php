<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use App\Models\User;
use App\Models\BalanceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class WithdrawRequestController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first() // یا همه رو بفرست
            ], 422);
        }

        $user = Auth::user();

        if ($user->balance < $request->amount) {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient balance'
            ], 400);
        }

        WithdrawRequest::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Withdrawal request submitted successfully'
        ]);
    }


    public function process(Request $request, $id)
    {
        $withdraw = WithdrawRequest::findOrFail($id);

        // بررسی دسترسی ادمین
        if (!Auth::user()->isAdmin()) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        if ($withdraw->status !== 'pending') {
            return redirect()->back()->with('error', 'Withdrawal already processed');
        }

        $user = $withdraw->user;
        if ($user->balance < $withdraw->amount) {
            return redirect()->back()->with('error', 'Insufficient user balance');
        }

        $withdraw->status = 'completed';
        $withdraw->save();

        // به‌روزرسانی موجودی کاربر
        $user->balance -= $withdraw->amount;
        $user->save();

        // ثبت لاگ موجودی
        BalanceLog::create([
            'user_id' => $user->id,
            'amount' => -$withdraw->amount,
            'type' => 'withdrawal',
            'description' => 'Withdrawal completed'
        ]);

        return redirect()->back()->with('success', 'Withdrawal processed successfully');
    }
}
