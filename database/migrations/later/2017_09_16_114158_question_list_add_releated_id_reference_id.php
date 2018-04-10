<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionListAddReleatedIdReferenceId extends Migration
{
     public function up()
    {
        Schema::table('question_list', function($table) {
		
			$table->string('specialize_id')->nullable();
			
		});
    }
}
