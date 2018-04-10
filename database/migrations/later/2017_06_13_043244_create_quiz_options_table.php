<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id')->references('id')->on('quiz_eia')->onUpdate('cascade')->onDelete('cascade');
            $table->string('option')->nullable();
            $table->tinyInteger('correct')->nullable()->default(0);
            
           
            $table->softDeletes();

            $table->index(['deleted_at']);
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
        Schema::dropIfExists('quiz_options');
    }
}
