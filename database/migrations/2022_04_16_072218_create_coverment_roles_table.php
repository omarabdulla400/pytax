<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovermentRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverment_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->string('name_kr')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('mark')->nullable();
            $table->integer('ranges')->nullable();
            $table->integer('year')->nullable();
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
        Schema::drop('coverment_roles');
    }
}
