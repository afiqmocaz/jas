<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayInfosAddPaymentId extends Migration
{
    public function up()
	{
		Schema::table('pay_infos', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
