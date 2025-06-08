<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Deposit extends Model
{
    protected $fillable = ['user_id', 'amount', 'status', 'payment_proof'];

    protected static function booted()
    {
        static::created(function ($deposit) {
            // Create BalanceLog when deposit is created
            BalanceLog::create([
                'user_id' => $deposit->user_id,
                'amount' => $deposit->amount,
                'type' => 'deposit',
                'status' => 'pending',
                'description' => "Deposit request ID: {$deposit->id}"
            ]);
            Log::info('BalanceLog created for deposit', ['deposit_id' => $deposit->id]);
        });

        static::updated(function ($deposit) {
            if ($deposit->wasChanged('status')) {
                DB::transaction(function () use ($deposit) {
                    $balanceLog = BalanceLog::where('description', "Deposit request ID: {$deposit->id}")->firstOrFail();
                    $balanceLog->update(['status' => $deposit->status]);

                    if ($deposit->status === 'accepted') {
                        $user = $deposit->user;
                        $user->increment('balance', $deposit->amount);
                        Log::info('User balance updated for deposit', [
                            'user_id' => $user->id,
                            'deposit_id' => $deposit->id,
                            'amount' => $deposit->amount,
                            'new_balance' => $user->balance
                        ]);
                    }
                });
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
