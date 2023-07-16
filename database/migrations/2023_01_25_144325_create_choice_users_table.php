<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateChoiceUsersTable extends Migration
{
    /**
     * choice_users - each user will select minimal one pack
     * to generate quotes.
     * all choise with user_id is store in this table.
     * This table is necessary to show informations in quote.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice_users', function (Blueprint $table) {
            $table->id('id_choice_user');
            $table->integer('user_id');
            $table->string('quote_numero');
            $table->integer('pack_id');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->integer('price_with_discount')->nullable();
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
        Schema::dropIfExists('choix_users');
    }
}
