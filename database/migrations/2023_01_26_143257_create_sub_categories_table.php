<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateSubCategoriesTable extends Migration
{
    /**
     * sub_categories - is sub categories informations
     * in example: Microsoft Business and Microsoft Enterprise
     * are two sub categorie of categorie Licensing.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id('id_sub_categorie');
            $table->integer('categorie_id');
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
        Schema::dropIfExists('sub_categories');
    }
}
