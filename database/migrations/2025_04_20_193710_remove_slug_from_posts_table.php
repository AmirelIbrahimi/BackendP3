<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // SQLite workaround: recreate the posts table without 'slug'
        Schema::create('posts_temp', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->boolean('published')->default(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Copy data from old posts to new one (excluding slug)
        DB::statement('INSERT INTO posts_temp (id, title, content, published, user_id, created_at, updated_at) SELECT id, title, content, published, user_id, created_at, updated_at FROM posts');

        // Drop the old posts table
        Schema::drop('posts');

        // Rename the new one to posts
        Schema::rename('posts_temp', 'posts');
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable();
        });
    }
};
