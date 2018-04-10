<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIetsExamTitleIdToIetsSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iets_schedules', function (Blueprint $table) {
            $table->integer('ietsexamtitle_id')->nullable()->after('typeofexam')->unsigned();
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
            $table->dropColumn('ietsexamtitle_id');
        });
    }
}
