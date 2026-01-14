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
        Schema::create('course_content', function (Blueprint $table) {
            $table->id('course_content_id');
            $table->string('course_content_name');
            $table->string('url')->nullable();
            $table->integer('duration')->nullable();
            $table->string('type')->nullable();
            $table->integer('course_category_id')->nullable();
            $table->integer('instructor_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->json('contain')->nullable();
            $table->boolean('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CourseContent');
    }
};
