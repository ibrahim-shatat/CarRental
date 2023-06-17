<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Renter extends Authenticatable

{
    use HasFactory,HasRoles,HasApiTokens;
    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }
    protected static function boot() {
        parent::boot();

        static::deleting(function($renter) {
            $renter->user()->delete();

        });
        static::deleting(function($car) {
            $car->car()->delete();

        });
        static::deleting(function($reservations) {
            $reservations->reservations()->delete();

        });
        static::deleting(function($reviwes) {
            $reviwes->reviwes()->delete();

        });
    }
    public function car(){
        return $this->belongsTo(Car::class ,'car_id' ,'id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class , 'renter_id', 'id'); 
    }

    public function reviwes(){
        return $this->hasMany(Review::class , 'renter_id', 'id'); 
    }
    public function getFullNameAttribute(){
        return $this->user->first_name ." ".$this->user->last_name;
    }
    public function getGenderAttribute(){
        return $this->user->gender;
    }
    public function getCityNameAttribute(){
        return $this->user->city->name;
    }
    public function getImagesAttribute(){
        return $this->user->image;
    }
}