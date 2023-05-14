<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable(false);
            $table->date('birthdate')->nullable(false);
            $table->string('mobile', 15)->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->enum('city', ['Cairo', 'Giza', 'Sharkia', '10th of Ramadan', 'other'])->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('university')->nullable(false);
            $table->enum('bachelor_degree', ['Engineering', 'Commerce', 'Business Administration', 'other'])->nullable(false);
            $table->enum('graduation_year', ['2024', '2025', 'other'])->nullable(false);
            $table->string('major')->nullable(false);
            $table->enum('preferred_industry', ['Lighting', 'Panels', 'Steel', 'Sheet Metal Fabrication', 'Support Functions (HR, ICT, SCM & Finance)'])->nullable(false);
            $table->enum('preferred_training_field', ['Technical Office (Engineers only)', 'Commercial', 'Manufacturing', 'Human Resources', 'Finance', 'Supply Chain', 'Information & Communications Technology'])->nullable(false);
            $table->enum('grade', ['Fair', 'Good', 'Very Good', 'Excellent'])->nullable(false);
            $table->string('grade_certificate')->nullable(false);
            $table->string('training_info')->nullable(true);
            $table->enum('source', ['Company Website', 'Linkedin', 'Facebook', 'Referral'])->nullable(false);
            $table->string('referral_name')->nullable(true);
            $table->string('password')->nullable(false);
            $table->boolean('IsAccepted')->default(false);
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
        Schema::dropIfExists('interns');
    }
}
