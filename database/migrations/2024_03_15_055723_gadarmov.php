<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gadarmov extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gadarmov', function (Blueprint $table) {
            $table->id();
            $table->integer('gadaractual_id');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_location');
            $table->integer('office_id');
            $table->string('division');
            $table->string('section');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
