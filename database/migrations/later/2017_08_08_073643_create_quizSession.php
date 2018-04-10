<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizSession extends Migration
{
     public function up()
    {
        Schema::create('quiz_session', function (Blueprint $table) {
            $table->increments('id');
			$table->string('user_id')->nullable();
			$table->string('answer_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_session');
    }
}
