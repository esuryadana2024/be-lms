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
        Schema::create('to_quest', function (Blueprint $table) {
            $table->id('to_quest_id');
            $table->integer('try_out_id')->nullable();
            $table->string('type')->nullable();
            $table->text('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('correct_answer')->nullable();
            $table->integer('course_id')->nullable();
            $table->timestamps('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_quest');
    }
};
