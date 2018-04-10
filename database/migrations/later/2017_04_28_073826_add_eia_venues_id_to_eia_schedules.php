<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEiaVenuesIdToEiaSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eia_schedules', function (Blueprint $table) {
            $table->integer('eiavenue_id')->nullable()->after('end')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eia_schedules', function (Blueprint $table) {
            $table->dropColumn('eiavenue_id');
        });
    }
}
