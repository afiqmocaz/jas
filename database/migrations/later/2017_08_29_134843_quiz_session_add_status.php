<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizSessionAddStatus extends Migration
{
     public function up()
    {
        Schema::table('quiz_session', function($table) {
			$table->string('status')->nullable();
		});
    }
}
