<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsQuestionszTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_questionsz', function (Blueprint $table) {
            $table->increments('id');$table->binary('fileToUpload')->nullable();
            $table->string('type');
            $table->string('question');
            $table->string('i')->nullable();
            $table->string('ii')->nullable();
            $table->string('iii')->nullable();
            $table->string('iv')->nullable();
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d')->nullable();
            $table->string('correct');
            $table->string('related')->nullable();
            $table->string('level');
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
        Schema::dropIfExists('iets_questionsz');
    }
}
