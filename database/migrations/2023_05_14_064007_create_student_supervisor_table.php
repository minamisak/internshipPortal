<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('student_supervisor', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('intern_id');
        $table->unsignedBigInteger('supervisor_id');
        $table->timestamps();

        $table->foreign('intern_id')->references('id')->on('interns')->onDelete('cascade');
        $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_supervisor');
    }
}
