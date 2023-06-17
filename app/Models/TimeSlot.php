<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    public function reservations(){
        return $this->hasMany(Reservation::class , 'time_slot_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($timeslot) {
            $timeslot->reservations()->delete();

        });
    }
}