<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchedulesAddCategory extends Migration
{
     public function up()
    {
        Schema::table('schedules', function($table) {
			$table->string('category')->nullable();
		});
    }
}
