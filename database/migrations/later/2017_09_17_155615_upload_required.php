<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UploadRequired extends Migration
{
  
	public function up()
	{
		Schema::table('upload', function($table) {
			$table->string('assign_panel')->nullable();
			$table->string('status')->nullable();
			$table->string('exam_candidate_id')->nullable();
		});
	}
}
