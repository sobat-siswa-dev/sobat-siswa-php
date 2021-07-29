<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbmReportDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbm_report_det', function (Blueprint $table) {
            $table->id();
            $table->decimal('mark_knowledge')->nullable();
            $table->decimal('mark_practice')->nullable();
            $table->decimal('mark_total')->nullable();
            $table->decimal('mark_limit')->nullable();
            $table->integer('subject_id')->nullable();
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
        Schema::dropIfExists('kbm_report_det');
    }
}
