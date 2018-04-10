<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EiaIvSchedulesAddPaymentId extends Migration
{
    public function up()
	{
		Schema::table('eia_iv_schedules', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
