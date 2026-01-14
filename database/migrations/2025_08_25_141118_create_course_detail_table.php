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
        Schema::create('course_detail', function (Blueprint $table) {
            $table->id('course_detail_id');
            $table->string('course_detail_name')->nullable();
            $table->integer('duration')->nullable();
            $table->boolean('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CourseDetail');
    }
};
