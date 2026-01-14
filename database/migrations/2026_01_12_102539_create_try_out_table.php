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
        Schema::create('try_out', function (Blueprint $table) {
            $table->id('try_out_id');
            $table->string('try_out_name')->nullable();
            $table->date('date')->nullable();
            $table->integer('course_id')->nullable();
            $table->string('course_name')->nullable();
            $table->string('img')->nullable();
            $table->string('price')->nullable();
            $table->boolean('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('try_out');
    }
};
