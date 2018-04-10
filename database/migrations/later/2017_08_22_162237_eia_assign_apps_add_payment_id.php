<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EiaAssignAppsAddPaymentId extends Migration
{
    public function up()
	{
		Schema::table('eia_assign_apps', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
