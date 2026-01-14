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
        Schema::create('instructor', function (Blueprint $table) {
            $table->id('instructor_id');
            $table->string('instructor_name');
            $table->string('instructor_code')->nullable();
            $table->string('email')->nullable();
            $table->text('desc')->nullable();
            $table->string('photo')->nullable();
            $table->json('expertise')->nullable();
            $table->json('other')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Instructor');
    }
};
