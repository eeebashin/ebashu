<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait CategoryTrait
{
	public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

	public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->format('Y-m-d H:i:s');
    }

    public function products(): BelongsToMany

    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }
}
