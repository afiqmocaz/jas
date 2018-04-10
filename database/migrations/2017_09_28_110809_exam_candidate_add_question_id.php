<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamCandidateAddQuestionId extends Migration
{
	 public function up()
    {
      Schema::table('exam_candidates', function($table) {
		
			$table->string('question_id')->nullable();
			
		});
	}
}