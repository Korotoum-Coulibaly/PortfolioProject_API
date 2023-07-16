<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateQuotesTable extends Migration
{
    /**
     * quotes - is table that contain all information validate per user for have one quote.
     *when user select pack to make your choice,this table is not fills.But after to clck
     *on button generate devis, this table is fills and quote copy is stock to attribute quote_copy.
     *date_expiration: is date_emission + 30 days.
     *prospect_id: permeted to inform information about the requester.
     *office_id: permeted to recover information of administration who deliver this quote.
     *id_quote - generate automatically.
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id('id_quote');
            $table->integer('user_id');
            $table->timestamp('date_emission');
            $table->datetime('date_expiration');
            $table->integer('all_price');
            $table->integer('prospect_id');
            $table->integer('office_id');
            $table->string('quote_numero')->unique();
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
        Schema::dropIfExists('devis');
    }
}
