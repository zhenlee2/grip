<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gadar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gadar', function (Blueprint $table) {
            $table->id();
            $table->integer('gadartime_id');
            $table->integer('gadcategory_id');
            $table->integer('gadtotal_id');
            $table->integer('indicator_code');
            $table->integer('user_id');
            $table->string('gad_mandate');
            $table->string('result_indicator');
            $table->integer('prev_remark');
            $table->decimal('prev_male');
            $table->decimal('prev_female');
            $table->decimal('prev_budget');
            $table->integer('prev_totalsex');
            $table->integer('target_male');
            $table->integer('target_female');
            $table->integer('target_totalsex');
            $table->string('pap_desc');
            $table->integer('pap_code');
            $table->string('gad_activity');
            $table->decimal('budget_tierone');
            $table->decimal('budget_tiertwo');
            $table->decimal('budget_totalamount');
            $table->string('source');
            $table->string('responsible_unit');
            $table->string('unit');
            $table->string('rawresponsible_unit');
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
