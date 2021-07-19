<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_token', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->string('token')->nullable();
            $table->datetime('expired_at');
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
        Schema::dropIfExists('adm_token');
    }
}
