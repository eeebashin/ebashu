<?php

namespace App\Http\Resources;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PostResource extends JsonResource
{

    public function toArray($request): array
    {

        /** @var Post $this */
        return [
            'id' => $this->id,
            'text' => $this->text,
            'data' => $this->data->toDateTimeString(),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
