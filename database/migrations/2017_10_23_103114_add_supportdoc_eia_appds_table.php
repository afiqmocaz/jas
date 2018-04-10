<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupportdocEiaAppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eia_appds', function (Blueprint $table) {
            //

		$table->string('supportdoc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eia_appds', function (Blueprint $table) {
            //

		$table->string('supportdoc')->nullable();
        });
    }
}
