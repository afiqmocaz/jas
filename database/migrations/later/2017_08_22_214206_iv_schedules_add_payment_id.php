<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IvSchedulesAddPaymentId extends Migration
{
    public function up()
	{
		Schema::table('iv_schedules', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
