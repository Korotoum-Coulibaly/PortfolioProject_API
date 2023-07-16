<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreatePackProductsTable extends Migration
{
    /**
     * Pack_products - permeted to associate pack with many products.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack_products', function (Blueprint $table) {
            $table->id('id_packProduct');
            $table->integer('pack_id');
            $table->integer('product_id');
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
        Schema::dropIfExists('pack_products');
    }
}
