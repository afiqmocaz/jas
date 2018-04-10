<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizEiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_eia', function (Blueprint $table) {
            $table->increments('id');

            //$table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
            $table->string('limg')->nullable();
            $table->string('module');
            $table->string('question',500);
            $table->string('i')->nullable();
            $table->string('ii')->nullable();
            $table->string('iii')->nullable();
            $table->string('iv')->nullable();
            $table->integer('eiarelated_id')->unsigned()->nullable();
            $table->foreign('eiarelated_id')->references('id')->on('eia_relates');
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
        Schema::dropIfExists('quiz_eia');
    }
}
