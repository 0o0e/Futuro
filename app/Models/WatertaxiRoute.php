<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WatertaxiRoute extends Model
{
    use HasFactory;


    protected $fillable = ['destination','duration','price'];


    public function bookings(){
        return $this->hasMany(Booking::class);

    }

}
