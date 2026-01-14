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
        Schema::create('toa_detail', function (Blueprint $table) {
            $table->id('toa_detail_id');
            $table->date('date');
            $table->integer('to_assesment_id')->nullable();
            $table->integer('to_quest_id')->nullable();
            $table->string('answer')->nullable();
            $table->string('correct_answer')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('score')->nullable();
            $table->integer('course_id')->nullable();
            $table->boolean('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toa_detail');
    }
};
