<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

final class ProductFullResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Product $this */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'created_at' => $this->formatted_created_at,
            'updated_at' => $this->formatted_updated_at,
        ];
    }
}
