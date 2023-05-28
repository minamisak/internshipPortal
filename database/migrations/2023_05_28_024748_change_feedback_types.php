<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFeedbackTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('supervise_feedback_student', function (Blueprint $table) {
            $table->string('supervisor_full_name')->nullable()->change();
            $table->unsignedBigInteger('supervisor_id')->nullable()->change();
            $table->string('supervisor_title')->nullable()->change();
            $table->string('intern_full_name')->nullable()->change();
            $table->unsignedBigInteger('intern_id')->nullable()->change();
            $table->string('training_industry')->nullable()->change();
            $table->string('training_field')->nullable()->change();
            $table->string('training_round')->nullable()->change();
            $table->text('considered_other_people')->nullable()->change();
            $table->string('receptive')->nullable()->change();
            $table->string('punctual_and_dependable')->nullable()->change();
            $table->string('demonstrated_completed_tasks')->nullable()->change();
            $table->string('quality_of_completed_tasks')->nullable()->change();
            $table->string('able_to_learn')->nullable()->change();
            $table->string('critical_thinking')->nullable()->change();
            $table->string('academically_prepared')->nullable()->change();
            $table->text('intern_strengths')->nullable()->change();
            $table->text('intern_weaknesses')->nullable()->change();
            $table->string('hire_intern')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
