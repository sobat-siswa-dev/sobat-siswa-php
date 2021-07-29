<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbmReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kbm_report', function (Blueprint $table) {
            $table->id();
            $table->string('attch')->nullable();
            $table->string('student_name')->nullable();
            $table->string('class_name')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('total_subject')->nullable();
            $table->decimal('mark_total')->nullable();
            $table->decimal('mark_rate')->nullable();
            $table->string('year_learn')->nullable();
            $table->date('get_at');
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
        Schema::dropIfExists('kbm_report');
    }
}
