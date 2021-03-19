<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('d1',60)->nullable();
            $table->string('t1',60)->nullable();
            $table->string('d2',60)->nullable();
            $table->string('t2',60)->nullable();
            $table->string('d3',60)->nullable();
            $table->string('t3',60)->nullable();
            $table->string('d4',60)->nullable();
            $table->string('t4',60)->nullable();
            $table->string('d5',60)->nullable();
            $table->string('t5',60)->nullable();
            $table->string('d6',60)->nullable();
            $table->string('t6',60)->nullable();
            $table->string('d7',60)->nullable();
            $table->string('t7',60)->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
