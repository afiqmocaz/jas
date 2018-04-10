<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IvSchedulesAddExamCandidate extends Migration
{
    public function up()
	{
		
		Schema::table('iv_schedules', function($table) {
			$table->dropColumn('user_id');
			$table->dropColumn('payment_id');
			$table->string('exam_candidate')->nullable();
		});
		
	}
}
