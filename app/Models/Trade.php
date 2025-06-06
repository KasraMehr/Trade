<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trade extends Model
{
    protected $fillable = ['user_id', 'amount_invested', 'profit_or_loss', 'notes', 'traded_at'];

    protected $dates = ['traded_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
