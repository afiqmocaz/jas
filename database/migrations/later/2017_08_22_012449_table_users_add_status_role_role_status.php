<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUsersAddStatusRoleRoleStatus extends Migration
{
    public function up()
	{
		Schema::table('users', function($table) {
			$table->string('status')->nullable();
			$table->string('role')->nullable();
			$table->string('role_status')->nullable();
		});
	}
}
