<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbmReportDetEx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbm_report_det_ex', function (Blueprint $table) {
            $table->id();
            $table->string('mark')->nullable();
            $table->integer('subject_ex_id')->nullable();
            $table->integer('report_id')->nullable();
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
        Schema::dropIfExists('kbm_report_det_ex');
    }
}
