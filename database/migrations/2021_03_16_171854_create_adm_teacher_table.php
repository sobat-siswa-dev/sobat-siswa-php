<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_teacher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password', 100)->nullable();
            $table->integer('school_id')->nullable();
            $table->timestamps();
            $table->string('photo')->nullable();
            $table->integer('role')->nullable();
            $table->integer('is_active')->nullable();
            $table->string('structural_pos')->nullable();
            $table->string('nip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm_teacher');
    }
}
