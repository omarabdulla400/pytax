<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetStudentStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_student_stages', function (Blueprint $table) {
            $table->id();
            $table->integer('student')->nullable();
            $table->integer('stage')->nullable();
            $table->integer('study_status')->nullable();
            $table->integer('education_year')->nullable();
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
        Schema::dropIfExists('set_student_stages');
    }
}
