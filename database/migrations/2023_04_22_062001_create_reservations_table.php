<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('reservation_time');
            $table->date('reservation_date'); 
            $table->enum('payment_method' , ['cash' , 'visa'])->default('cash');

            $table->foreignId('car_id');
            $table->foreign('car_id')->on('cars')->references('id')->cascadeOnDelete();
            
            $table->foreignId('renter_id');
            $table->foreign('renter_id')->on('renters')->references('id')->cascadeOnDelete();

            $table->foreignId('time_slot_id');
            $table->foreign('time_slot_id')->on('time_slots')->references('id')->cascadeOnDelete();
            
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
        Schema::dropIfExists('reservations');
    }
}