<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DiscountCode extends Model
{
    protected $fillable = [
        'code',
        'amount',
        'is_used',
        'used_at',
        'used_by_user_id'
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'used_at' => 'datetime',
        'amount' => 'decimal:2'
    ];

    public static function generateUniqueCode(): string
    {
        do {
            $code = Str::random(10);
        } while (self::where('code', $code)->exists());

        return $code;
    }

    public function markAsUsed($userId = null): void
    {
        $this->update([
            'is_used' => true,
            'used_at' => now(),
            'used_by_user_id' => $userId
        ]);
    }
}