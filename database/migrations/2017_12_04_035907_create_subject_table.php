<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('subject', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('majorid');
          $table->string('name');
          $table->string('description');
          $table->smallInteger('isRead');
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
        Schema::dropIfExists('subject');
    }
}
