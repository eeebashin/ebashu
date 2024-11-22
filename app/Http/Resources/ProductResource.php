<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

final class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Product $this */

        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
