<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddprcIndicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pcr', function (Blueprint $table) {

            $table->integer('pcindicator_id')->after('indicator_id');
            $table->string('accom_quality')->after('accom_indicator_desc');
            $table->string('accom_quantity')->after('accom_quality');
            $table->string('accom_timeliness')->after('accom_quantity');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pcr', function (Blueprint $table) {

            $table->dropColumn('pcindicator_id');
            $table->dropColumn('accom_quality');
            $table->dropColumn('accom_quantity');
            $table->dropColumn('accom_timeliness');
 
        });
    }
}
