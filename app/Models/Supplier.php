<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Supplier extends Authenticatable
{
    use HasFactory,HasRoles,HasApiTokens;
    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }
    protected static function boot() {
        parent::boot();

        static::deleting(function($supplier) {
            $supplier->user()->delete();
        });
        static::deleting(function($car) {
            $car->cars()->delete();
        });

    }
    public function car(){
        return $this->belongsTo(Car::class ,'car_id' ,'id');
    }

    public function getFullNameAttribute(){
        return $this->user->first_name ." ".$this->user->last_name;
    }
    public function getImagesAttribute(){
        return $this->user->image;
    }
    public function getGenderAttribute(){
        return $this->user->gender;
    }
    public function getCityNameAttribute(){
        return $this->user->city->name;
    }
}