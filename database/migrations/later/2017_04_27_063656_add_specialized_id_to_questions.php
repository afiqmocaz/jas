<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpecializedIdToQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apcsquestions', function (Blueprint $table) {
             $table->integer('specialized_id')->nullable()->after('limg')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apcsquestions', function (Blueprint $table) {
            $table->dropColumn('specialized_id');
        });
    }
}
