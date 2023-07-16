<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateAnswersTable extends Migration
{
    /**
     * answers - To each question, we associate answers.
     * And to each answer, we make cases of possible returns in algorithm.
     * example: if the answer=No for the question id =2 corresponds to (quantity) do this
     *...
     * ps:  We need an association table to associate each answer to each user.
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id('id_answer');
            $table->string('answer');
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
        Schema::dropIfExists('answers');
    }
}
