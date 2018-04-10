<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('figure')->nullable();
            $table->string('question');
            $table->string('sub1_ans')->nullable();
            $table->string('sub2_ans')->nullable();
            $table->string('sub3_ans')->nullable();
            $table->string('sub4_ans')->nullable();
            $table->string('ans1');
            $table->string('ans2');
            $table->string('ans3');
            $table->string('ans4')->nullable();
            $table->integer('true_ans');
            $table->integer('module_id');
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
        Schema::dropIfExists('quizzes');
    }
}
