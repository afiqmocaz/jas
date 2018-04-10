<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizEiaAddDifficultyLevel extends Migration
{
	public function up()
	{
		Schema::table('quiz_eia', function($table) {
			$table->string('difficulty_level')->nullable();
		});
	}
}
