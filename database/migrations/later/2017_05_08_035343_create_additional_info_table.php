<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_info', function (Blueprint $table) {
           $table->increments('id');
        $table->string('filename');
        $table->string('mime');
		$table->string('sizefile');
        $table->string('original_filename')->unique();
		$table->integer('user_id')->nullable()->unsigned();
		$table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('additional_info');
    }
}
