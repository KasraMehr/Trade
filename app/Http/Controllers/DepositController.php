<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\BalanceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class DepositController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:10',
            'payment_method' => 'required|in:crypto',
            'payment_proof' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $deposit = Deposit::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'status' => 'pending',
            'payment_proof' => $request->payment_proof
        ]);

        return redirect()->back()->with('success', 'Deposit request submitted successfully');
    }

    public function process(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);

        // بررسی دسترسی ادمین
        if (!Auth::user()->isAdmin()) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        if ($deposit->status !== 'pending') {
            return redirect()->back()->with('error', 'Deposit already processed');
        }

        $deposit->status = 'completed';
        $deposit->save();

        // به‌روزرسانی موجودی کاربر
        $user = $deposit->user;
        $user->balance += $deposit->amount;
        $user->save();

        // ثبت لاگ موجودی
        BalanceLog::create([
            'user_id' => $user->id,
            'amount' => $deposit->amount,
            'type' => 'deposit',
            'description' => 'Deposit completed'
        ]);

        return redirect()->back()->with('success', 'Deposit processed successfully');
    }
}
