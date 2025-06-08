<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WithdrawRequest extends Model
{
    protected $table = 'withdraw_requests';
    protected $fillable = ['user_id', 'amount', 'status'];

    protected static function booted()
    {
        static::created(function ($withdrawRequest) {
            // Create BalanceLog when withdrawal is created
            BalanceLog::create([
                'user_id' => $withdrawRequest->user_id,
                'amount' => $withdrawRequest->amount,
                'type' => 'withdrawal',
                'status' => 'pending',
                'description' => "Withdrawal request ID: {$withdrawRequest->id}"
            ]);
            Log::info('BalanceLog created for withdrawal', ['withdraw_request_id' => $withdrawRequest->id]);
        });

        static::updated(function ($withdrawRequest) {
            if ($withdrawRequest->wasChanged('status')) {
                DB::transaction(function () use ($withdrawRequest) {
                    $balanceLog = BalanceLog::where('description', "Withdrawal request ID: {$withdrawRequest->id}")->firstOrFail();
                    $balanceLog->update(['status' => $withdrawRequest->status]);

                    if ($withdrawRequest->status === 'accepted') {
                        $user = $withdrawRequest->user;
                        if ($user->balance >= $withdrawRequest->amount) {
                            $user->decrement('balance', $withdrawRequest->amount);
                            Log::info('User balance updated for withdrawal', [
                                'user_id' => $user->id,
                                'withdraw_request_id' => $withdrawRequest->id,
                                'amount' => $withdrawRequest->amount,
                                'new_balance' => $user->balance
                            ]);
                        } else {
                            Log::error('Insufficient balance for withdrawal', [
                                'user_id' => $user->id,
                                'withdraw_request_id' => $withdrawRequest->id,
                                'amount' => $withdrawRequest->amount,
                                'balance' => $user->balance
                            ]);
                            throw new \Exception('Insufficient balance');
                        }
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
