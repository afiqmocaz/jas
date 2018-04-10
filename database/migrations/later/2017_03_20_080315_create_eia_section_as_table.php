<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEiaSectionAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eia_section_as', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->unique();
            $table->string('applicant_id')->nullable();
            $table->string('image');
            // $table->string('name');
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('state');
            $table->string('country_id');
            $table->string('mailaddress');
            $table->string('mailpostcode');
            $table->string('email');
            $table->string('bumiputerastatus');
            $table->string('phoneno');
            $table->string('faxno')->nullable();
            $table->string('regNo')->nullable();
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
        Schema::dropIfExists('eia_section_as');
    }
}
