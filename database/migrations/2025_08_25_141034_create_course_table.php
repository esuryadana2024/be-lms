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
        Schema::create('Course', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name');
            $table->dateTime('date')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('overview')->nullable();
            $table->string('certificate')->nullable();
            $table->integer('course_category_id')->nullable();
            $table->integer('instructor_id')->nullable();
            $table->json('contain')->nullable();
            $table->string('slug')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Course');
    }
};
