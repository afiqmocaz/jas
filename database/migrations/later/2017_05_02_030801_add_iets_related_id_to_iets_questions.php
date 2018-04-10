<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIetsRelatedIdToIetsQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iets_questions', function (Blueprint $table) {
            $table->integer('ietsrelated_id')->nullable()->after('correct')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iets_questions', function (Blueprint $table) {
            $table->dropColumn('ietsrelated_id');
        });
    }
}
