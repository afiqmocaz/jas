<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEiaSectionEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eia_section_es', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id')->nullable()->unsigned();
            $table->string('applicant_id')->nullable();
            // $table->string('name')->nullable();
            $table->string('first_specialize');
            $table->string('second_specialize');
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
        Schema::dropIfExists('eia_section_es');
    }
}
