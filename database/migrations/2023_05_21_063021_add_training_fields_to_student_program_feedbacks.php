<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingFieldsToStudentProgramFeedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_program_feedbacks', function (Blueprint $table) {
            //
            $table->string('training_industry')->nullable();
            $table->string('training_field')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_program_feedbacks', function (Blueprint $table) {
            //
        });
    }
}
