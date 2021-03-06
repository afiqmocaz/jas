<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionList2 extends Migration
{
    public function up()
    {
        Schema::create('question_list', function (Blueprint $table) {
            $table->increments('id');

            //$table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
            $table->string('limg')->nullable();
            $table->string('module');
            $table->string('question');
            $table->string('i')->nullable();
            $table->string('ii')->nullable();
            $table->string('iii')->nullable();
            $table->string('iv')->nullable();
            $table->integer('eiarelated_id')->unsigned()->nullable();
			  $table->integer('ietsrelated_id')->unsigned()->nullable();
			  $table->integer('apcsrelated_id')->unsigned()->nullable();
			  $table->integer('related_id')->unsigned()->nullable();
            
            // $table->string('related')->nullable
            
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
        Schema::dropIfExists('question_list');
    }
}
