<?php

namespace App\Traits;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait PostTrait
{

	public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

	public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->format('Y-m-d H:i:s');
    }


    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
