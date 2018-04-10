<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamCandidatesAddStatusAssigmentAndStatusInterview extends Migration
{

	
     public function up()
	{
		Schema::table('exam_candidates', function($table) {
			 $table->dropColumn('status_assigment');
			 $table->dropColumn('status_interview');
		});
		
		Schema::table('exam_candidates', function($table) {
			$table->enum('status_assigment', array('created','passed','failed'));	
			$table->enum('status_interview', array('pending','assigned','accepted','rejected','passed','failed'));	
		});
		
	}
}
