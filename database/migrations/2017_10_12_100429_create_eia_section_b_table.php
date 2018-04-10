<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEiaSectionBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eia_section_b', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id')->nullable();
	    $table->string('coursetitle');
	    $table->string('major');
	    $table->string('universityname');
	    $table->string('date_from',12);
	    $table->string('date_to',12);
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
        Schema::drop('eia_section_b');
    }
}
