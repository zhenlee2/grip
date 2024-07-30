<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblGmefScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gmef_score', function (Blueprint $table) {
            $table->id();
            $table->integer('questionnaire_id');
            $table->string('score_no_desc');
            $table->string('score_partly_desc');
            $table->string('score_yes_desc');
            $table->integer('point_no');
            $table->integer('point_partly');
            $table->integer('point_yes');
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
        Schema::dropIfExists('tbl_gmef_score');
    }
}
