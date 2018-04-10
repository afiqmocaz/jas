<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEiaAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eia_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
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
            $table->string('faxno');
            $table->string('regNo');
            $table->string('placeofissue');
            $table->date('date');
            $table->string('coursetitle');
            $table->string('major');
            $table->string('universityname');
            $table->date('from');
            $table->date('to');
            $table->string('course');
            $table->date('date1');
            $table->string('cert');
            $table->string('participate');
            $table->string('project');
            $table->string('position');
            $table->string('responsibilities');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->string('name1');
            $table->string('address1');
            $table->string('email1');
            $table->string('first');
            $table->string('second');
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
        Schema::dropIfExists('eia_apps');
    }
}
