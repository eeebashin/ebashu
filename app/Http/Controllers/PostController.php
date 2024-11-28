<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductFullResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    /**
     * Получение всех постов.
     */
    public function index(): AnonymousResourceCollection
    {
        $posts = Post::with('comments')->get();
        return PostResource::collection($posts); // Возвращаем коллекцию постов с комментариями
    }

    /**
     * Создание нового поста.
     */
    public function store(StorePostRequest $request): PostResource
    {
        $post = Post::create([
            'text' => $request->text,
            'data' => now(),  // добавляем значение для поля data
        ]);

        return new PostResource($post);
    }

    /**
     * Получение поста по ID.
     */
    public function show($id): PostResource|JsonResponse
    {
        $post = Post::with('comments')->find($id);

        if (!$post) {
            return response()->json(['message' => 'Пост не найден'], 404);
        }

        return new PostResource($post); // Возвращаем пост с комментариями
    }

    /**
     * Обновление поста.
     */
    public function update(UpdatePostRequest $request, $id): PostResource|JsonResponse
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Пост не найден'], 404);
        }

        $post->update([
            'text' => $request->text,
        ]);

        return new PostResource($post); // Возвращаем обновлённый пост
    }

    /**
     * Удаление поста.
     */
    public function destroy($id): JsonResponse
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Пост не найден'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Пост удалён']);
    }
}
