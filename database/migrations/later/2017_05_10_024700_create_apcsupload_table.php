<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApcsuploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apcsupload', function (Blueprint $table) {
          $table->increments('id');
        $table->string('filename');
		$table->string('sizefile');
        $table->string('mime');
        $table->string('original_filename');
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
        Schema::drop('apcsupload');
    }
}
