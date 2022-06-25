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
        Schema::create('role_items', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->nullable();
            $table->integer('roleName')->nullable();
            $table->tinyInteger('viewData')->default('0')->nullable();
            $table->tinyInteger('addData')->default('0')->nullable();
            $table->tinyInteger('updateData')->default('0')->nullable();
            $table->tinyInteger('filterData')->default('0')->nullable();
            $table->tinyInteger('extractData')->default('0')->nullable();
            $table->tinyInteger('deleteData')->default('0')->nullable();
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
        Schema::dropIfExists('role_items');
    }
};
