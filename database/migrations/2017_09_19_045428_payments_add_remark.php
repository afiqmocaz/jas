<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentsAddRemark extends Migration
{
    public function up()
    {
        Schema::table('payments', function($table) {
		
			$table->string('remark')->nullable();
			
		});
    }
}
