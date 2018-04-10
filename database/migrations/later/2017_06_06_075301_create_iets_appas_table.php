<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsAppasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_appas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->unique();
            $table->string('applicant_id')->nullable();
            $table->string('image');
            // $table->string('name');
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->integer('postcode');
            $table->string('country_id');
            $table->string('state');
            $table->string('mailaddress');
            $table->string('mailpostcode');
            $table->string('email');
            $table->string('bumiputerastatus');
            $table->string('phoneno');
            $table->string('faxno')->nullable();
            $table->string('placeofissue')->nullable();
            $table->string('dateofissue')->nullable();
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
        Schema::dropIfExists('iets_appas');
    }
}
