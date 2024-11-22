<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\ProductTrait;

/**
 * @property int $id
 * @property string $name
 * @property int $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property string $formatted_created_at
 * @property string $formatted_upated_at
 */
final class Product extends Model
{
    use HasFactory, ProductTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
