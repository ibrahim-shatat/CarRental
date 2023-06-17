<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory ,SoftDeletes;

    public function car(){
        return $this->belongsTo(Car::class ,'car_id' ,'id');
    }
    
    public function renter(){
        return $this->belongsTo(Renter::class , 'renter_id', 'id'); 
    }
    public function time_slot(){
        return $this->belongsTo(TimeSlot::class , 'time_slot_id', 'id'); 
    }
    
}