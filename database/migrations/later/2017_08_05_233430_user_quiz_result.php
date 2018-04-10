<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserQuizResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quiz_result', function (Blueprint $table) {
            $table->increments('id');
			$table->string('user_id')->nullable();
            $table->string('module_id')->nullable();
			$table->string('scored')->nullable();
			$table->string('total_socre')->nullable();
			$table->string('start_time')->nullable();
			$table->string('finish_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quiz_result');
    }
}
