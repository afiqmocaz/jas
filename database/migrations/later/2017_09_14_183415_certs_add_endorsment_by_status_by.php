<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CertsAddEndorsmentByStatusBy extends Migration
{
   
    public function up()
    {
        Schema::table('certs', function($table) {
			$table->string('endorsement_by')->nullable();
			$table->string('status_by')->nullable();
			
		});
    }

   
}
