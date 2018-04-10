<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CertsAddUniqueKey extends Migration
{
     public function up()
	{
		Schema::table('certs', function($table) {
			$table->unique(array('user_id', 'category'));
		});
	}
}
