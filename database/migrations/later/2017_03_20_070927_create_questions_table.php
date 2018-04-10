<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            //$table->date('date_created');
            //$table->string('author_name');
            //$table->integer('modul_id');
            //$table->integer('submodul_id');
            
            //$table->binary('figure');
            $table->string('question');
            $table->string('sub1_ans')->nullable();
            $table->string('sub2_ans')->nullable();
            $table->string('sub3_ans')->nullable();
            $table->string('sub4_ans')->nullable();
            $table->string('ans1');
            $table->string('ans2');
            $table->string('ans3');
            $table->string('ans4');
            $table->integer('true_ans');
            $table->integer('level_id');
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
        Schema::dropIfExists('questions');
    }
}
