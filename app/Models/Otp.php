<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    protected $fillable = [
        'email',
        'mobile',
        'otp_code',
        'type',
        'expires_at',
        'is_used',
        'used_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
        'is_used' => 'boolean',
    ];

    /**
     * Generate a new OTP
     */
    public static function generate($email, $mobile = null, $type = 'registration')
    {
        // Invalidate any existing OTPs for this email/mobile
        self::where('email', $email)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->update(['is_used' => true, 'used_at' => now()]);

        // Generate 6-digit OTP
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        return self::create([
            'email' => $email,
            'mobile' => $mobile,
            'otp_code' => $otpCode,
            'type' => $type,
            'expires_at' => now()->addMinutes(10), // OTP expires in 10 minutes
        ]);
    }

    /**
     * Verify OTP
     */
    public static function verify($email, $otpCode, $type = 'registration')
    {
        $otp = self::where('email', $email)
            ->where('otp_code', $otpCode)
            ->where('type', $type)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if ($otp) {
            $otp->update([
                'is_used' => true,
                'used_at' => now(),
            ]);
            return true;
        }

        return false;
    }

    /**
     * Check if OTP is expired
     */
    public function isExpired()
    {
        return $this->expires_at < now();
    }

    /**
     * Scope for unused OTPs
     */
    public function scopeUnused($query)
    {
        return $query->where('is_used', false);
    }

    /**
     * Scope for valid OTPs (not expired)
     */
    public function scopeValid($query)
    {
        return $query->where('expires_at', '>', now());
    }
}
