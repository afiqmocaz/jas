<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RubricAddUploadId extends Migration
{public function up()
	{
		Schema::table('rubrics', function($table) {
			$table->string('upload_id')->nullable();
		});
	}
}
