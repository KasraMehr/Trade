<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\WithdrawRequest;
use App\Models\BalanceLog;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // موجودی کیف پول
        $walletBalance = $user->balance;

        // سود کلی
        $totalProfit = BalanceLog::where('user_id', $user->id)
            ->where('type', 'profit')
            ->sum('amount');

        // درصد سود
        $profitPercentage = $totalProfit > 0 && $user->balance > 0
            ? round(($totalProfit / $user->balance) * 100, 2)
            : 0;

        // سرمایه‌گذاری‌های فعال
        $activeInvestments = Deposit::where('user_id', $user->id)
            ->where('status', 'completed')
            ->sum('amount');

        // تیکت‌های اخیر
        $recentTickets = Ticket::where('user_id', $user->id)
            ->count();
        $unreadTickets = Ticket::where('user_id', $user->id)
            ->where('status', 'open')
            ->count();

        // تریدهای فعال (مثال ساده، باید مدل Trade اضافه شود)
        $activeTrades = [
            [
                'id' => 1,
                'pair' => 'BTC/USDT',
                'type' => 'buy',
                'amount' => '0.05 BTC',
                'price' => '48500.50',
                'openTime' => now()->subDays(20)->toDateTimeString(),
                'status' => 'open',
                'profit' => 1250.75
            ],
            [
                'id' => 2,
                'pair' => 'ETH/USDT',
                'type' => 'sell',
                'amount' => '2.5 ETH',
                'price' => '3250.75',
                'openTime' => now()->subDays(18)->toDateTimeString(),
                'status' => 'open',
                'profit' => -320.50
            ],
            [
                'id' => 3,
                'pair' => 'ADA/USDT',
                'type' => 'buy',
                'amount' => '500 ADA',
                'price' => '1.25',
                'openTime' => now()->subDays(16)->toDateTimeString(),
                'status' => 'closed',
                'closeTime' => now()->subDays(14)->toDateTimeString(),
                'profit' => 125.00
            ]
        ];

        // تاریخچه تراکنش‌ها
        $transactions = BalanceLog::where('user_id', $user->id)
            ->latest()
            ->get()
            ->map(function ($log) {
                return [
                    'id' => $log->id,
                    'type' => $log->type,
                    'amount' => number_format($log->amount, 2, '.', ''),
                    'status' => $log->status ?? 'completed',
                    'date' => $log->created_at->toDateTimeString()
                ];
            });

        return Inertia::render('Dashboard', [
            'walletBalance' => number_format($walletBalance, 2, '.', ''),
            'totalProfit' => number_format($totalProfit, 2, '.', ''),
            'profitPercentage' => $profitPercentage,
            'activeInvestments' => number_format($activeInvestments, 2, '.', ''),
            'recentTickets' => $recentTickets,
            'unreadTickets' => $unreadTickets,
            'activeTrades' => $activeTrades,
            'transactions' => $transactions
        ]);
    }
}
