<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelatedCategory extends Migration
{
 public function up()
    {
        Schema::table('relates', function($table) {
		
			$table->enum('category',['eia','iets','apcs']);
			
		});
    }
}
