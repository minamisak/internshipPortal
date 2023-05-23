<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperviseFeedbackStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervise_feedback_student', function (Blueprint $table) {
            $table->id();
            $table->string('supervisor_full_name');
            $table->unsignedBigInteger('supervisor_id');
            $table->string('supervisor_title');
            $table->string('intern_full_name');
            $table->unsignedBigInteger('intern_id');
            $table->string('training_industry');
            $table->string('training_field');
            $table->string('training_round');
            $table->text('considered_other_people');
            $table->string('receptive');
            $table->string('punctual_and_dependable');
            $table->string('demonstrated_completed_tasks');
            $table->string('quality_of_completed_tasks');
            $table->string('able_to_learn');
            $table->string('critical_thinking');
            $table->string('academically_prepared');
            $table->text('intern_strengths');
            $table->text('intern_weaknesses');
            $table->boolean('hire_intern');
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')->on('users');
            $table->foreign('intern_id')->references('id')->on('interns');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervise_feedback_student');
    }
}
