<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id('progress_id');
            $table->unsignedBigInteger('goal_id');
            $table->foreign('goal_id')->references('goal_id')->on('iep_goals')->onDelete('cascade');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('progress_percentage');
            $table->text('progress_notes')->nullable();
            $table->integer('progress_week');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};