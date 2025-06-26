<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'condition',
        'ad_type',
        'price',
        'starting_bid',
        'current_bid',
        'bid_increment',
        'buy_now_price',
        'auction_ends_at',
        'location_city',
        'location_postal_code',
        'accepts_pickup',
        'shipping_cost',
        'status',
        'views_count',
        'is_promoted_until',
        'promoted_by_share',
        'published_at',
        'expires_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'starting_bid' => 'decimal:2',
        'current_bid' => 'decimal:2',
        'bid_increment' => 'decimal:2',
        'buy_now_price' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'auction_ends_at' => 'datetime',
        'accepts_pickup' => 'boolean',
        'promoted_by_share' => 'boolean',
        'is_promoted_until' => 'datetime',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
        // Enums são tratados como strings por defeito, o que é aceitável.
        // Para PHP 8.1+ Enums, poderíamos fazer:
        // 'condition' => \App\Enums\AdConditionEnum::class,
        // 'ad_type' => \App\Enums\AdTypeEnum::class,
        // 'status' => \App\Enums\AdStatusEnum::class,
    ];

    /**
     * Get the user (seller) that owns the ad.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that the ad belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images for the ad.
     */
    public function images(): HasMany
    {
        // Assumindo que teremos um modelo AdImage
        return $this->hasMany(AdImage::class);
    }

    /**
     * Get the bids for the ad (if it's an auction).
     */
    public function bids(): HasMany
    {
        // Assumindo que teremos um modelo Bid
        return $this->hasMany(Bid::class);
    }
}
