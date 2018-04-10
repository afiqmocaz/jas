<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UploadAddCategoryQuestion extends Migration
{
	public function up()
	{
		Schema::table('upload', function($table) {
			$table->string('category')->nullable();
			$table->string('question')->nullable();
		});
	}
}
