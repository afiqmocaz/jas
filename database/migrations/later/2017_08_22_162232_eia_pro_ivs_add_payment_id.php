<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EiaProIvsAddPaymentId extends Migration
{
	public function up()
	{
		Schema::table('eia_pro_ivs', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
