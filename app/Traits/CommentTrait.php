<?php

namespace App\Traits;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CommentTrait
{
    // Связь с постом (многие к одному)
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'id');
    }

    // Связь с родительским комментарием (многие к одному)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Связь с вложенными комментариями (один ко многим)
    public function children(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
	public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

	public function getFormattedUpdatedAtAttribute(): string
    {
        return $this->updated_at->format('Y-m-d H:i:s');
    }


    public function comments(): BelongsTo
    {
        return $this->BelongsTo(Post::class, 'post_id');
    }
}
