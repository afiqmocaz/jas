<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExamSetting extends Migration
{     
	public function up()
    {
        Schema::create('exam_setting', function (Blueprint $table) {
            $table->increments('id');
			$table->string('no_of_question')->nullable();
			$table->string('easy_percentage')->nullable();
			$table->string('medium_percentage')->nullable();
			$table->string('hard_percentage')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_setting');
    }
}
