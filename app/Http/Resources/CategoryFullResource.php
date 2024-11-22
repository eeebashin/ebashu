<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;

final class CategoryFullResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Category $this */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'created_at' => $this->formatted_created_at,
            'updated_at' => $this->formatted_updated_at,
        ];
    }
}
