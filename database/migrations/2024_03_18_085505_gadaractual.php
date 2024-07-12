<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gadaractual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gadaractual', function (Blueprint $table) {
            $table->id();
            $table->integer('gadar_id');
            $table->integer('verify_id');
            $table->integer('quarter');
            $table->integer('physical_male');
            $table->integer('physical_female');
            $table->integer('physical_sextotal');
            $table->string('gadar_actualactivity');
            $table->decimal('tierone_actual');
            $table->decimal('tiertwo_actual');
            $table->decimal('total_actualexpen');
            $table->string('justification');
            $table->string('remark_secretariat');
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
