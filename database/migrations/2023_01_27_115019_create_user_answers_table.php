<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateUserAnswersTable extends Migration
{
    /**
     * user_answers - this table associate answer with user.
     * It was impossible to know to which user an answer was
     * associated and also which of the answers should be used to generate the next estimate.
     * So we have added attribute quote_id and attribute user_id.
     * quote_id: the quote_id attribute is only filled in when we have used the
     * response to generate a quote, so all responses without quote_id are the last responses.
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id('id_userAnswer');
            $table->integer('user_id');
            $table->integer('answer_id');
            $table->integer('quote_id')->nullable();
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
        Schema::dropIfExists('user_answers');
    }
}
