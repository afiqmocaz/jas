<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsEndorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_endorses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->date('passexamdate')->nullable();
            $table->string('exammark')->nullable();
            $table->date('markdate')->nullable();
            $table->date('PCERdate')->nullable();
            $table->string('PCERmark')->nullable();
            $table->date('ivdate')->nullable();
            $table->string('ivstatus')->nullable();
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
        Schema::dropIfExists('iets_endorses');
    }
}
