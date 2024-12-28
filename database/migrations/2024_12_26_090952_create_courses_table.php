<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->float('price')->default(0);
            $table->float('discount_price')->nullable();
            $table->enum('status', ['Draft', 'Published', 'Archived'])->default('Draft');
            $table->enum('level', ['Beginner', 'Intermediate', 'Advanced'])->default('Beginner');
            $table->foreignId('language_id')->constrained();
            $table->integer('duration')->nullable();
            $table->boolean('certificate')->default(false);
            $table->float('rating')->nullable();
            $table->integer('enrollment_limit')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->boolean('live_class_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
