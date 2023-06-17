<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function car(){
        return $this->belongsTo(Car::class ,'car_id' ,'id');
    }

    public function renter(){
        return $this->belongsTo(Renter::class , 'renter_id', 'id');
    }

}