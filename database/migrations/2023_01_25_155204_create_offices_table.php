<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * in this class
 * function up - Run the migrations
 * function down - Reverse the migrations
 */
class CreateOfficesTable extends Migration
{
    /**
     * offices - is the organisation ability to deliver quote in this application.
     * Only one office permitted
     * office example is Cloud Steroids
     * Subject_quotation_form: is subject select by office
     * remark_subject_quotation: is other information added by offices.
     * example: "this quotes is note available after 2024..."
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id('id_office');
            $table->string('office_name');
            //$table->file('logo');
            $table->string('location');
            $table->string('subject_quotation_form');
            $table->string('remark_subject_quotation');
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
        Schema::dropIfExists('offices');
    }
}
