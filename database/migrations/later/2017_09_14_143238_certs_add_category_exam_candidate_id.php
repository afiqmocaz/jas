<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CertsAddCategoryExamCandidateId extends Migration
{
   public function up()
	{
		Schema::table('certs', function($table) {
			
			$table->dropColumn('applicantname');
			
			$table->string('exam_candidate_id')->nullable();
			$table->string('category')->nullable();
		});
	}
}
