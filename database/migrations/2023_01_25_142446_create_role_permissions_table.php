<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateRolePermissionsTable extends Migration
{
    /**
     * role_permisssions - is an association table
     * that allows to associate several permissions to each role
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id('id_rolePermission');
            $table->integer('role_id');
            $table->integer('permission_id');
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
        Schema::dropIfExists('role_permissions');
    }
}
