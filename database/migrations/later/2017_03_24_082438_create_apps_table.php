<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country_id')->nullable();
            $table->string('mailaddress')->nullable();
            $table->string('mailpostcode')->nullable();
            $table->string('email')->nullable();
            $table->string('bumiputerastatus')->nullable();
            $table->string('phoneno')->nullable();
            $table->string('faxno')->nullable();
            $table->string('placeofissue')->nullable();
            $table->date('date')->nullable();
            $table->string('specialize')->nullable();
            $table->string('coursetitle')->nullable();
            $table->string('major')->nullable();
            $table->string('universityname')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->date('projectStart')->nullable();
            $table->date('projectComplete')->nullable();
            $table->string('proposaltitle')->nullable();
            $table->string('clientname')->nullable();
            $table->string('clientaddress')->nullable();
            $table->date('starttrainning')->nullable();
            $table->date('endtraining')->nullable();
            $table->string('seminarname')->nullable();
            $table->string('venue')->nullable();
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
        Schema::dropIfExists('apps');
    }
}
