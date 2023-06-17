<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('color');
            $table->string('model');
            $table->enum('status' , ['active' , 'inactive'])->default('inactive');
            $table->enum('gear_stick_type' , ['manual' , 'Automatic'])->default('manual');
            $table->enum('tank_type' , ['petrol' , 'diesel'])->default('diesel');
            $table->integer('buy_price');
            $table->integer('rent_price');
            $table->foreignId('supplier_id');
            $table->foreign('supplier_id')->on('suppliers')->references('id')->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('cars');
    }
}