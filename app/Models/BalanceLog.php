<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BalanceLog extends Model
{
    protected $fillable = ['user_id', 'amount', 'type', 'status', 'description'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
