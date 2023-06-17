<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory,SoftDeletes;
    public function car(){
        return $this->belongsTo(Car::class ,'car_id' ,'id');
    }
    
    public function buyer(){
        return $this->belongsTo(Buyer::class , 'buyer_id', 'id'); 
    }
}