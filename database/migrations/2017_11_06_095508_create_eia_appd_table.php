<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEiaAppdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eia_appd', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
           // $table->string('applicant_id')->nullable();
            $table->string('participate');
            $table->string('project_name');
            $table->string('position');
            $table->string('responsibilities');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->string('numdays')->nullable();
            $table->string('numMonths')->nullable();
            $table->string('ref_name');
            $table->string('ref_address');
            $table->string('ref_email');
	    $table->string('ref_position');
	    $table->string('supportdoc');

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
        Schema::dropIfExists('eia_appd');
    }
}
