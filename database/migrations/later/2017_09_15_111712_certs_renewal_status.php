<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CertsRenewalStatus extends Migration
{
   public function up()
	{
		Schema::table('certs', function($table) {
			$table->enum('renewal_status', array('0','applied','approve','reject','payment_submitted','granted','not_granted'));	
			$table->string('renewal_applied_date')->nullable();
		});
	}
}
