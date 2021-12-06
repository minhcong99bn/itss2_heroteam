<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flashcard', function (Blueprint $table) {
            $table->increments('card_id');
            $table->unsignedInteger('collection_id');
            $table->foreign('collection_id')->references('collection_id')->on('collection');
            $table->string('card_front');
            $table->text('card_back');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flashcard');
    }
}
