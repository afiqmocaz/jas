<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProIvsAddPaymentId extends Migration
{
     public function up()
	{
		Schema::table('pro_ivs', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
