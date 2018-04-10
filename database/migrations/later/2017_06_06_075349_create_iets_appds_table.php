<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsAppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_appds', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id')->nullable()->unsigned();
            $table->string('applicant_id')->nullable();
            $table->date('starttrainning');
            $table->date('endtraining');
            $table->string('seminarname');
            $table->string('venue');
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
        Schema::dropIfExists('iets_appds');
    }
}
