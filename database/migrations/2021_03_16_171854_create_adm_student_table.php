<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_student', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nis')->nullable();
            $table->string('name')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('gender')->nullable();
            $table->integer('school_id')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('picture')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->integer('alumn_id')->nullable();
            $table->integer('is_active')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_work')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_work')->nullable();
            $table->string('vice_name')->nullable();
            $table->string('vice_work')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm_student');
    }
}
