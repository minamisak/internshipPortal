<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguagesToInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interns', function (Blueprint $table) {
            //
            $table->string('language1')->nullable();
            $table->string('language1_rating')->nullable();
            $table->string('language2')->nullable();
            $table->string('language2_rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interns', function (Blueprint $table) {
            $table->dropColumn('language1');
            $table->dropColumn('language1_rating');
            $table->dropColumn('language2');
            $table->dropColumn('language2_rating');
        });
    }
}
