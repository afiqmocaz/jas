<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture')->nullable();
            $table->string('name')->nullable();
            $table->string('ic')->nullable();
            $table->date('dob')->nullable();
            $table->string('qp_no')->nullable();
            $table->string('specialized_area_1')->nullable();
            $table->string('specialized_area_2')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('qp_status')->nullable();
            $table->string('certificate')->nullable();
            $table->date('cert_exp_date')->nullable();
            $table->integer('user_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
