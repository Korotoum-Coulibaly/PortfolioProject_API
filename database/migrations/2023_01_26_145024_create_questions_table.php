<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateQuestionsTable extends Migration
{
    /**
     * questions - This table use in the case
     * where user don't know what pack do you choose.
     * Many question in function of pack asked to the
     * customer to select perfectly pack.
     * all Answer of each question is store in table answer.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id('id_question');
            $table->string('libelle');
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
        Schema::dropIfExists('questions');
    }
}
