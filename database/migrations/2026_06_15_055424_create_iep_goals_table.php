<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iep_goals', function (Blueprint $table) {
            $table->id('goal_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('goal_category', ['Academic', 'Communication', 'Behaviour', 'Self-Help']);
            $table->text('goal_description');
            $table->text('goal_methods');
            $table->date('goal_target_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iep_goals');
    }
};