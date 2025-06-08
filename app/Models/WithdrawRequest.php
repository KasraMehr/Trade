<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WithdrawRequest extends Model
{
    protected $table = 'withdraw_requests';
    protected $fillable = ['user_id', 'amount', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
