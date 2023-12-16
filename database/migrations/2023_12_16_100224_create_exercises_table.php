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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('course_id')->unsigned();
            $table->string('name', 45);
            $table->decimal('points');
            $table->timestamps(3);

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->index(['category_id']);
            $table->index(['course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
