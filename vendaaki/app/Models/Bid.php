<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'user_id',
        'amount',
        'is_auto_bid',
        'max_auto_bid_amount',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'max_auto_bid_amount' => 'decimal:2',
        'is_auto_bid' => 'boolean',
    ];

    /**
     * Get the ad that the bid belongs to.
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }

    /**
     * Get the user that made the bid.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
