<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deposit extends Model
{
    protected $fillable = ['user_id', 'amount', 'status', 'payment_proof'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
