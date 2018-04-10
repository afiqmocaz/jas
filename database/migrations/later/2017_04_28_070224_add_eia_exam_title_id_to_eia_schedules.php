<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEiaExamTitleIdToEiaSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eia_schedules', function (Blueprint $table) {
            $table->integer('eiaexamtitle_id')->nullable()->after('typeofexam')->unsigned();
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
            $table->dropColumn('eiaexamtitle_id');
        });
    }
}
