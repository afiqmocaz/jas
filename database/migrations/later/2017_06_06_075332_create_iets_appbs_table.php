<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIetsAppbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iets_appbs', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id')->nullable();
            $table->string('applicant_id')->nullable();
            $table->string('coursetitle');
            $table->string('major');
            $table->string('universityname');
            $table->date('from');
            $table->date('to');
            $table->string('cert');
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
        Schema::dropIfExists('iets_appbs');
    }
}
