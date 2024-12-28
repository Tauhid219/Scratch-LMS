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
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('course_id')->constrained();
            $table->text('description')->nullable();
            $table->datetime('schedule');
            $table->integer('duration')->nullable();
            $table->enum('platform', ['Zoom', 'Google Meet']);
            $table->string('meeting_link');
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('language_id')->constrained();
            $table->enum('status', ['Upcoming', 'Completed'])->default('Upcoming');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_classes');
    }
};
