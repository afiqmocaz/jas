<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserQuizAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quiz_answer', function (Blueprint $table) {
            $table->increments('id');
			$table->string('session_id')->nullable();
            $table->string('user_id')->nullable();
			$table->string('quiz_eia_id')->nullable();
			$table->string('choosed_option')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quiz_answer');
    }
}
