<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','invoice_number','amount','status','sent_at','due_date','payment_method','paid_at','notes'];

    public function booking(){
        return $this->belongsTo(Booking::class);

    }


}
