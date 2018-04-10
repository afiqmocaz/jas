<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('state');
            $table->string('mailaddress');
            $table->string('mailpostcode');
            $table->string('email');
            $table->string('bumiputerastatus');
            $table->string('phoneno');
            $table->string('faxno');
            $table->string('placeofissue');
            $table->date('date');
            $table->string('coursetitle');
            $table->string('major');
            $table->string('universityname');
            $table->date('from');
            $table->date('to');
            $table->date('projectStart');
            $table->date('projectComplete');
            $table->string('proposaltitle');
            $table->string('clientname');
            $table->string('clientaddress');
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
        Schema::dropIfExists('iets_apps');
    }
}
