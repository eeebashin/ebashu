<?php

namespace App\Models;

use App\Traits\PostTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

/**
 * @property int $id
 * @property string $text
 * @property Carbon $data
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $formatted_created_at
 * @property string $formatted_updated_at
 */

final class Post extends Model
{
    use HasFactory, PostTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'];
}
