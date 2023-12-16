<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();

            $table->integer('score');
            $table->integer('score_normalized');
            $table->string('start_difficulty', 45);
            $table->string('end_difficulty', 45);
            $table->unsignedInteger('timestamp');

            $table->timestamps(3);

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['course_id']);
            $table->index(['category_id']);
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
