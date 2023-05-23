<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProgramFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_program_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id')->constrained('users');
            $table->foreignId('intern_id')->constrained('interns');
            $table->string('intern_full_name');
            $table->string('mobile_number');
            $table->string('supervisor_full_name');
            $table->string('supervisor_title');
            $table->string('orientation_sufficient')->nullable();
            $table->string('oversee_work')->nullable();
            $table->string('supervisor_available')->nullable();
            $table->string('challenging_internship')->nullable();
            $table->string('practical_skills')->nullable();
            $table->string('positive_work_environment')->nullable();
            $table->string('build_network')->nullable();
            $table->string('recommend_internship')->nullable();
            $table->text('consider_working_organization')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_program_feedbacks');
    }
}
