<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_question', function (Blueprint $table) {
            $table->increments('id');
			$table->string('question')->unique();
			$table->string('que_pic');
			$table->string('sub_ans1');
			$table->string('sub_ans2');
			$table->string('sub_ans3');
			$table->string('sub_ans4');
			$table->string('ans1');
			$table->string('ans2');
			$table->string('ans3');
			$table->string('ans4');
			$table->string('trueans');
			$table->string('que_status');
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
        Schema::dropIfExists('iets_question');
    }
}
