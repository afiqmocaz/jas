<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEiaRelatedIdToEiaQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eia_questions', function (Blueprint $table) {
            $table->integer('eiarelated_id')->nullable()->after('correct')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eia_questions', function (Blueprint $table) {
            $table->dropColumn('eiarelated_id');
        });
    }
}
