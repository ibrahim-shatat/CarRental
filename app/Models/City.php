<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class , 'country_id' , 'id');
    }
    public function carShows(){
        return $this->hasMany(CarShow::class , 'city_id' , 'id');
    }
    public function users(){
        return $this->hasMany(User::class , 'city_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($carShows) {
            $carShows->carShows()->delete();

        });
        static::deleting(function($users) {
            $users->users()->delete();

        });
    }
}