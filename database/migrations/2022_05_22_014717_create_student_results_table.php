<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            $table->integer('setStudentStage')->nullable();
            $table->integer('subject_and_departments')->nullable();
            $table->integer('activity')->default(0);
            $table->integer('final')->default(0);
            $table->integer('result')->default(0);
            $table->integer('second_semester')->default(0);
            $table->integer('final_result')->default(0);
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
        Schema::dropIfExists('student_results');
    }
};
