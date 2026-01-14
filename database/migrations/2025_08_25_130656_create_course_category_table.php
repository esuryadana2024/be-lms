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
        Schema::create('CourseCategory', function (Blueprint $table) {
            $table->id('course_category_id');
            $table->string('course_category_name');
            $table->string('img')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CourseCategory');
    }
};
