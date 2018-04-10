<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CertAddStatusEnum extends Migration
{
     public function up()
	{
		
		Schema::table('certs', function($table) {
			
			$table->dropColumn('status');
			
			
		});
		Schema::table('certs', function($table) {
			
			
			$table->enum('status',['created','certified','not_certified']);
		});
	}
}
