<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBehCounseling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beh_counseling', function (Blueprint $table) {
            $table->id();
            $table->date('held_date');
            $table->string('place')->nullable();
            $table->string('problem')->nullable();
            $table->string('solution')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('attch')->nullable();
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
        Schema::dropIfExists('beh_counseling');
    }
}
