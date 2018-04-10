<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEiaExamquestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eia_examquest', function (Blueprint $table) {
            $table->increments('id');
			$table->date('date_created');
			$table->string('author_name');
			$table->integer('modul_id');
			$table->integer('submodul_id');
			$table->integer('level_id');
			$table->binary('figure');
			$table->string('question');
			$table->string('sub1_ans');
			$table->string('sub2_ans');
			$table->string('sub3_ans');
			$table->string('sub4_ans');
			$table->string('ans1');
			$table->string('ans2');
			$table->string('ans3');
			$table->string('ans4');
			$table->integer('true_ans');
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
        Schema::dropIfExists('eia_examquest');
    }
}
