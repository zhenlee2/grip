<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblGmefmovFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gmefmov_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actualmov_id');
            $table->string('file_name');
            $table->string('file_path');
            $table->unsignedBigInteger('file_size'); // If file size can be very large, otherwise use integer
            $table->string('file_type');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('section_id');
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
        Schema::dropIfExists('tbl_gmefmov_file');
    }
}
