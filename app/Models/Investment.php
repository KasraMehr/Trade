<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Investment extends Model
{
    protected $fillable = [
        'user_id', 'principal', 'current_amount', 'interest_rate',
        'started_at', 'last_compounded_at', 'status', 'plan'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'last_compounded_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function calculateDailyProfit(): void
    {
        $plan = config('investment_plans.plans.' . $this->plan);
        $dailyRate = mt_rand($plan['daily_profit_min'] * 100, $plan['daily_profit_max'] * 100) / 10000;
        $profit = $this->current_amount * $dailyRate;
        $this->current_amount += $profit;
        $this->last_compounded_at = now();
        $this->save();

        Log::info('Daily profit calculated', [
            'investment_id' => $this->id,
            'profit' => $profit,
            'new_amount' => $this->current_amount
        ]);

        // Check if duration is complete
        $planDuration = $plan['duration_days'];
        $daysElapsed = now()->diffInDays($this->started_at);
        if ($daysElapsed >= $planDuration) {
            $this->completeInvestment();
        }
    }

    public function completeInvestment()
    {
        DB::transaction(function () {
            $this->status = 'completed';
            $this->save();

            $user = $this->user;
            $user->increment('balance', $this->current_amount);
            $user->decrement('locked_balance', $this->principal);

            Log::info('Investment completed', [
                'investment_id' => $this->id,
                'returned_amount' => $this->current_amount,
                'user_balance' => $user->balance,
                'locked_balance' => $user->locked_balance
            ]);
        });
    }
}
