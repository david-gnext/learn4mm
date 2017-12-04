<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('content', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('subjectid');
          $table->string('content_main');
          $table->string('content_mm');
          $table->string('q1');
          $table->string('q2');
          $table->string('q3');
          $table->string('ans');
          $table->smallInteger('isFill');
          $table->string('hint');
          $table->smallInteger('audio');
          $table->string('img');
          $table->dateTime('created_time');
          $table->smallInteger('deleted_flag');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}
