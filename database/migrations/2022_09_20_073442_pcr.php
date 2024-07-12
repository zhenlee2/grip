<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pcr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr', function (Blueprint $table) {
            $table->id();
            $table->integer('indicator_id');
            $table->string('accom_indicator_desc');
            $table->decimal('rating_quality');
            $table->decimal('rating_quantity');
            $table->decimal('rating_timeliness');
            $table->decimal('rating_average');
            $table->string('remarks');
            $table->rememberToken();
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
