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
        Schema::create('certificate_student', function (Blueprint $table) {
            $table->id('certificate_student_id');
            $table->string('certificate_no')->nullable();
            $table->string('student_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('cert_theme')->nullable();
            $table->date('date_finish')->nullable();
            $table->boolean('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_student');
    }
};
