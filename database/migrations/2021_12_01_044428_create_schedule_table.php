<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('collection_id');
            $table->foreign('collection_id')->references('collection_id')->on('collection');
            $table->time('period up to the 1st time', $precision = 0);
            $table->time('period up to the 2nd time', $precision = 0);
            $table->time('period up to the 3rd time', $precision = 0);
            $table->time('period up to the 4th time', $precision = 0);
            $table->time('period up to the 5th time', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
