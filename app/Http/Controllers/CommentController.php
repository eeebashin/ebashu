<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Получение всех комментариев для поста.
     */
    public function index($postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json(['message' => 'Пост не найден'], 404);
        }

        $comments = $post->comments()->with('children')->get();
        return CommentResource::collection($comments); // Возвращаем коллекцию комментариев
    }

    /**
     * Создание нового комментария.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create([
            'text' => $request->text,
            'data' => now(),
            'post_id' => $request->post_id,
            'parent_id' => $request->parent_id, // null, если корневой комментарий
            'tree_id' => $request->tree_id, // null, если дерево не используется
        ]);

        return new CommentResource($comment); // Возвращаем созданный комментарий
    }

    /**
     * Получение комментария по ID.
     */
    public function show($id)
    {
        $comment = Comment::with('children')->find($id);

        if (!$comment) {
            return response()->json(['message' => 'Комментарий не найден'], 404);
        }

        return new CommentResource($comment); // Возвращаем комментарий с вложенными детьми
    }

    /**
     * Обновление комментария.
     */
    public function update(UpdateCommentRequest $request, $id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Комментарий не найден'], 404);
        }

        $comment->update([
            'text' => $request->text,
        ]);

        return new CommentResource($comment); // Возвращаем обновлённый комментарий
    }

    /**
     * Удаление комментария.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Комментарий не найден'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Комментарий удалён']);
    }
}
