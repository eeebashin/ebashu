<?php

namespace App\Models;

use App\Traits\CommentTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $text
 * @property Carbon $data
 * @property Carbon $post_id
 * @property Carbon $parent_id
 * @property Carbon $tree_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $formatted_created_at
 * @property string $formatted_updated_at
 */


class Comment extends Model
{
    use HasFactory, CommentTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'];
    // Определение связи один ко многим с комментариями
}
