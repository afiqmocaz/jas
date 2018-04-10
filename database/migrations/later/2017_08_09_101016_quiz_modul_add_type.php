<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizModulAddType extends Migration
{
    public function up()
	{
		Schema::table('quiz_modul', function($table) {
			$table->string('type')->nullable();
		});
	}
}
