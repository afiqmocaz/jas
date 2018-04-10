<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->nullable();
            $table->string('criteria')->default('Criteria');
            $table->string('percentage')->default('Percentage');
            $table->string('level')->nullable();
            $table->string('desc1')->nullable();
            $table->string('desc2')->nullable();
            $table->string('desc3')->nullable();
            $table->string('desc4')->nullable();
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
        Schema::dropIfExists('criterias');
    }
}
