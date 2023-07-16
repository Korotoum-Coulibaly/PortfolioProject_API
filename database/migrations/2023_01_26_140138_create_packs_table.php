<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreatePacksTable extends Migration
{
    /**
     * packs - is Microsoft packs.
     * exemple: Apps for business.
     * for each packs,you have many products(use packProduct_id).
     * Microsoft price: is pack price on Microsoft plateform.
     * Sale_price: is prise offered by Cloud Steroids.
     * Price with discount: user enter discount in frontend and it's applied to price.
     * dollar_cost: is dollars price in CFA in real time.
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->id('id_pack');
            $table->string('libelle');
            $table->integer('sub_categorie_id');
            $table->integer('microsoft_price');
            $table->integer('sale_price');
            $table->integer('dollar_cost');
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
        Schema::dropIfExists('packs');
    }
}
