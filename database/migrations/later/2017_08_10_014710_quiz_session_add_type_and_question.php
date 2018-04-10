<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizSessionAddTypeAndQuestion extends Migration
{
    public function up()
	{
		Schema::table('quiz_session', function($table) {
			$table->string('question_data')->nullable();
			$table->string('type')->nullable();
		});
	}
}
