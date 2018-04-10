<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // create upload table
        Schema::create('uploads', function(Blueprint $table) {
        $table->increments('id');
        $table->string('filename');
        $table->string('mime');
        $table->string('original_filename')->unique();
		$table->integer('user_id')->nullable()->unsigned();
		$table->foreign('user_id')->references('id')->on('users');
		//$table->foreign('user_id', 'fk_257_users_user_id_upload')->references('id')->on('users');
		//$table->integer('user_id')->references('id')->on('users');
		
        $table->timestamps();
      });
	  
	  
	  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // drop upload table
        Schema::drop('uploads');
    }
}
