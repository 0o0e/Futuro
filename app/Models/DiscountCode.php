<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiscountCode extends Model
{
    protected $fillable = [
        'code',
        'type',
        'amount',
        'is_used',
        'used_at',
        'used_by_user_id',
        'valid_from',
        'valid_until',
        'is_multi_use',
        'usage_count',
        'max_uses'
        'used_by_user_id'
      'hours','arrangement','purchaser_name','purchaser_email'
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'used_at' => 'datetime',
        'amount' => 'decimal:2',
        'valid_from' => 'date',
        'valid_until' => 'date',
        'is_multi_use' => 'boolean'
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
        if ($this->is_multi_use) {
            $this->increment('usage_count');
        } else {
            $this->update([
                'is_used' => true,
                'used_at' => now(),
                'used_by_user_id' => $userId
            ]);
        }
    }

    public function isValid(): bool
    {
        if (!$this->is_multi_use && $this->is_used) {
            return false;
        }

        if ($this->is_multi_use && $this->max_uses && $this->usage_count >= $this->max_uses) {
            return false;
        }

        $today = Carbon::today();

        if ($this->valid_from && $today->lt($this->valid_from)) {
            return false;
        }

        if ($this->valid_until && $today->gt($this->valid_until)) {
            return false;
        }

        return true;
    }

    public function getDiscountAmount($orderTotal): float
    {
        if ($this->type === 'percentage') {
            return ($orderTotal * $this->amount) / 100;
        }

        return $this->amount;
    }
}
