<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamCandidatesAddStatusEnum extends Migration
{
    
	
	
    public function up()
    {
		Schema::table('exam_candidates', function($table) {
			 $table->dropColumn('status');
		});
		
		
		Schema::table('exam_candidates', function($table) {
			$table->enum('status', array('created','absence','attended','finished','passed','failed'));	
		});
    }

}
