<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();      
            $table->string('name');
            $table->time('receipt_time');
            $table->date('receipt_date'); 
            $table->enum('payment_method' , ['cash' , 'visa'])->default('cash');

            $table->foreignId('car_id');
            $table->foreign('car_id')->on('cars')->references('id')->cascadeOnDelete();
            
            $table->foreignId('buyer_id');
            $table->foreign('buyer_id')->on('buyers')->references('id')->cascadeOnDelete();
            
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
        Schema::dropIfExists('receipts');
    }
}