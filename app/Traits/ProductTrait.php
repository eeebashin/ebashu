<?php

namespace App\Traits;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ProductTrait
{
	public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

	public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->format('Y-m-d H:i:s');
    }

    //TODO: изучить релейшен BelongsToMany
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

//    public function categories()
//    {
//        return $this->hasMany()
//    }
}
