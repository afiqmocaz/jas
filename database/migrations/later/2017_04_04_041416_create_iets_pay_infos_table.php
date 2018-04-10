<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsPayInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_pay_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('applicant_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('date')->nullable();
            $table->string('referenceNo')->nullable();
            $table->string('slip')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->default('In Process...');
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
        Schema::dropIfExists('iets_pay_infos');
    }
}
