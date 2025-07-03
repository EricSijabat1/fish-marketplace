<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'scientific_name',
        'description',
        'price',
        'stock',
        'unit',
        'catch_location',
        'catch_date',
        'freshness_level',
        'image',
        'gallery',
        'seller_id',
        'is_active'
    ];

    protected $casts = [
        'gallery' => 'array',
        'catch_date' => 'date',
        'price' => 'decimal:2'
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFreshnessLevelTextAttribute(): string
    {
        return match ($this->freshness_level) {
            'sangat_segar' => 'Sangat Segar',
            'segar' => 'Segar',
            'cukup_segar' => 'Cukup Segar',
            default => 'Tidak Diketahui'
        };
    }
}
