<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateRolesTable extends Migration
{
    /**
     * Roles - you have three roles.
     *in fact, role is the different type of users
     *consultant, commercial, business provider
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_role');
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
        Schema::dropIfExists('roles');
    }
}
