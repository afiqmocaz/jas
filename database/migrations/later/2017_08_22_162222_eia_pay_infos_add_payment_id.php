<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EiaPayInfosAddPaymentId extends Migration
{
    public function up()
	{
		Schema::table('eia_pay_infos', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
