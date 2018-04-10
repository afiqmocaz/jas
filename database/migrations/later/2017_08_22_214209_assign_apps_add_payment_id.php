<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssignAppsAddPaymentId extends Migration
{
    public function up()
	{
		Schema::table('assign_apps', function($table) {
			$table->string('payment_id')->nullable();
			
		});
	}
}
