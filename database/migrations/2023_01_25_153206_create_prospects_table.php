<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateProspectsTable extends Migration
{
    /**
     * prospects - this table contains all information for all requester
     * store by users.
     *This information is important to fills quote.
     * allied_enterprise: is the company that the prospect represents
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id('id_prospect');
            $table->string('name_prospect');
            $table->string('firstName_prospect');
            $table->string('sexe');
            $table->string('email')->unique();
            $table->string('allied_enterprise');
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
        Schema::dropIfExists('prospects');
    }
}
