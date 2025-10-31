<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    //
    use HasFactory;

    protected $fillable = ['service','date','time_start','time_end','people','name','email','comment','has_table', 'watertaxi_route_id','phone'];

    public function arrangement()
    {
        return $this->hasOne(Arrangement::class);
    }

    public function watertaxiRoute(){
        return $this->belongsTo(WatertaxiRoute::class);
    }


}
