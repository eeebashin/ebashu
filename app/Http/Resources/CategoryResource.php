<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;

final class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Category $this */

        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
