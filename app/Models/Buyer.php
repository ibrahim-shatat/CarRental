<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Buyer extends Authenticatable
{
    use HasFactory,HasRoles,HasApiTokens;
    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }
    protected static function boot() {
        parent::boot();

        static::deleting(function($buyer) {
            $buyer->user()->delete();

        });
        static::deleting(function($receipts) {
            $receipts->receipts()->delete();

        });
    }

    public function receipts(){
        return $this->hasOne(Receipt::class , 'buyer_id', 'id'); 
    }
    public function getFullNameAttribute(){
        return $this->user->first_name ." ".$this->user->last_name;
    }
    public function getImagesAttribute(){
        return $this->user->image;
    }
    public function getEmailAttribute(){
        return $this->user->email;
    }
    public function getGenderAttribute(){
        return $this->user->gender;
    }
    public function getCityNameAttribute(){
        return $this->user->city->name;
    }
}