<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmotionResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotion_responses', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('item_id')->unsigned();
	        $table->integer('participant_id')->unsigned();
	        $table->integer('value');
	        $table->integer('reaction_time');

	        $table->foreign('item_id')->references('id')->on('emotion_items')->onDelete('cascade');
	        $table->foreign('participant_id')->references('id')->on('emotion_participants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emotion_responses');
    }
}
