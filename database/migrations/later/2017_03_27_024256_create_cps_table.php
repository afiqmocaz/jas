<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('image')->nullable();
            $table->string('applicantname')->nullable();
            $table->string('IC')->nullable();
            $table->string('applicantid')->nullable();
            $table->string('cpid')->nullable();
            $table->string('cpstatus')->nullable();
            $table->string('cpd')->nullable();
            $table->date('start')->nullable();
            $table->date('expired')->nullable();
            $table->string('renewal');
            $table->string('status');
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
        Schema::dropIfExists('cps');
    }
}
