<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrangement extends Model
{
    //
    protected $fillable = ['booking_id', 'prosecco', 'picnic', 'olala', 'bistro', 'barca'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
