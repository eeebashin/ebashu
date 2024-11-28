<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Comment $this */

        return [
            'id' => $this->id,
            'text' => $this->text,
            'data' => $this->data,
            'post_id' => $this->post_id,
            'parent_id' => $this->parent_id,
            'tree_id' => $this->tree_id,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
