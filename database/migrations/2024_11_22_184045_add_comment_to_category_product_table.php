<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('category_product', function (Blueprint $table): void {
            $table->string('comment')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('category_product', function (Blueprint $table): void {
            $table->dropColumn('comment');
        });
    }
};
