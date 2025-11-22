<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class DiscountCode extends Model
{
    use HasFactory;

    protected $fillable = ['code','amount','is_used','used_at','used_by_user_id','hours','arrangement','purchaser_name','purchaser_email'];


}
