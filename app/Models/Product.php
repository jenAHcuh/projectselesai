<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'original_price',
        'image',
        'short_description',
        'description',
        'material',
        'category',
        'tags',
        'rating',
        'review_count',
        'sold_count',
        'sold_percentage',
        'time_left',
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }
}