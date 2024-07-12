<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PcIndicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_indicator', function (Blueprint $table) {
            $table->id();
            $table->integer('indicator_id');
            $table->integer('pc_id');
            $table->string('target_indicator_desc');
            $table->string('quantity');
            $table->string('quality');
            $table->string('timeliness');
            $table->string('sub_weight_allocation');
            $table->tinyInteger('sort');
            $table->decimal('alloted_budget',20,6);
            $table->string('accountability_center');
            $table->string('remarks');
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
        //
    }
}
