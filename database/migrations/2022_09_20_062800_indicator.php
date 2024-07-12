<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Indicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicator', function (Blueprint $table) {
            $table->id();
            $table->integer('office_id');
            $table->integer('parent_id');
            $table->string('target_indicator_desc');
            $table->string('quantity');
            $table->string('quality');
            $table->string('timeliness');
            $table->decimal('sub_weight_allocation',20,6);
            $table->tinyInteger('sort');
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
