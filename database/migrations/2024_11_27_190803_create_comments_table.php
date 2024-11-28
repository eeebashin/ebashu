<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();  // Автоматическое поле ID
            $table->text('text');  // Текст комментария
            $table->timestamp('data');  // Дата и время комментария
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');  // Связь с постом
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');  // Родительский комментарий
            $table->integer('tree_id')->nullable();  // Дерево комментариев
            $table->timestamps();  // Столбцы created_at и updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
}
