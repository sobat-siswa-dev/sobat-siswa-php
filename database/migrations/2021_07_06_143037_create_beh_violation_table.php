<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBehViolationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beh_violation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('get_at');
            $table->integer('rule_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->integer('poin')->nullable();
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
        Schema::dropIfExists('beh_violation');
    }
}
