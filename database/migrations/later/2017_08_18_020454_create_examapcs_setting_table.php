<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamapcsSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examapcs_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_of_question')->nullable();
            $table->string('easy_percentage')->nullable();
            $table->string('medium_percentage')->nullable();
            $table->string('hard_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examapcs_setting');
    }
}
