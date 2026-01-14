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
        Schema::create('to_assesment', function (Blueprint $table) {
            $table->id('to_assesment_id');
            $table->integer('try_out_id')->nullable();
            $table->string('try_out_name')->nullable();
            $table->date('date')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('student_name')->nullable();
            $table->string('score')->nullable();
            $table->integer('course_id')->nullable();
            $table->string('course_name')->nullable();
            $table->timestamps('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_assesment');
    }
};
