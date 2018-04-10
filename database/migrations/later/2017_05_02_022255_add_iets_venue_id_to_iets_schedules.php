<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIetsVenueIdToIetsSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iets_schedules', function (Blueprint $table) {
            $table->integer('ietsvenue_id')->nullable()->after('end')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iets_schedules', function (Blueprint $table) {
            $table->dropColumn('ietsvenue_id');
        });
    }
}
