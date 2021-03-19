<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('look_ups', function (Blueprint $table) {
            $table->id();
            $table->string('code',160)->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('grouping',160)->nullable();
            $table->string('category',160)->nullable();
            $table->string('color',100)->nullable();
            $table->unsignedBigInteger('sequence')->default(0);
            $table->unsignedTinyInteger('is_active')->default(1);
            $table->unsignedBigInteger('created_by')->default(0);
            $table->unsignedBigInteger('updated_by')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('look_ups');
    }
}
