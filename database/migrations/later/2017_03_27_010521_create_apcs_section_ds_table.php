<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApcsSectionDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apcs_section_ds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('applicant_id')->nullable();
            // $table->string('name')->nullable();
            $table->date('projectStart');
            $table->date('projectComplete');
            $table->string('numdays')->nullable();
            $table->string('numMonths')->nullable();
            $table->string('proposaltitle');
            $table->string('clientname');
            $table->string('clientaddress');
            $table->string('supportdoc')->nullable();
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
        Schema::dropIfExists('apcs_section_ds');
    }
}
