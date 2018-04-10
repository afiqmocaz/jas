<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_interview', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_user')->nullable()->unsigned();
		    $table->foreign('id_user')->references('id')->on('users');
			$table->string('name');
			$table->string('nric');
			$table->date('iv_date');
			$table->time('iv_time');
			$table->string('iv_venue');
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
        Schema::dropIfExists('iets_interview');
    }
}
