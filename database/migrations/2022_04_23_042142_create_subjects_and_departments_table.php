<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsAndDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_and_departments', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('department')->nullable();
            $table->string('stage')->nullable();
            $table->integer('theory')->nullable();
            $table->integer('practice')->nullable();
            $table->integer('education_type')->nullable();
            $table->integer('education_years')->nullable();
            $table->integer('admin')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('subjects_and_departments');
    }
}
