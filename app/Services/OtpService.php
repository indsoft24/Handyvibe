<?php

namespace App\Services;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OtpService
{
    /**
     * Send OTP for registration
     */
    public function sendRegistrationOtp($email, $mobile = null)
    {
        try {
            // Check if user already exists
            if (User::where('email', $email)->exists()) {
                return [
                    'success' => false,
                    'message' => 'User with this email already exists.',
                ];
            }

            // Generate OTP
            $otp = Otp::generate($email, $mobile, 'registration');

            // Send OTP via email
            $this->sendOtpEmail($email, $otp->otp_code, 'Registration');

            return [
                'success' => true,
                'message' => 'OTP sent successfully to your email.',
                'otp_id' => $otp->id,
            ];
        } catch (\Exception $e) {
            Log::error('Registration OTP Error: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.',
            ];
        }
    }

    /**
     * Send OTP for login
     */
    public function sendLoginOtp($email)
    {
        try {
            // Check if user exists
            $user = User::where('email', $email)->first();
            if (! $user) {
                return [
                    'success' => false,
                    'message' => 'No account found with this email address.',
                ];
            }

            // Check if user is active
            if (! $user->isActive()) {
                return [
                    'success' => false,
                    'message' => 'Your account is inactive. Please contact support.',
                ];
            }

            // Generate OTP
            $otp = Otp::generate($email, $user->mobile, 'login');

            // Send OTP via email
            $this->sendOtpEmail($email, $otp->otp_code, 'Login');

            return [
                'success' => true,
                'message' => 'OTP sent successfully to your email.',
                'otp_id' => $otp->id,
            ];
        } catch (\Exception $e) {
            Log::error('Login OTP Error: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.',
            ];
        }
    }

    /**
     * Verify OTP and complete registration
     */
    public function verifyRegistrationOtp($email, $otpCode, $userData)
    {
        try {
            // Verify OTP
            if (! Otp::verify($email, $otpCode, 'registration')) {
                return [
                    'success' => false,
                    'message' => 'Invalid or expired OTP.',
                ];
            }

            // Create user
            $user = User::create([
                'name' => $userData['name'],
                'email' => $email,
                'mobile' => $userData['mobile'] ?? null,
                'password' => bcrypt($userData['password']),
                'user_type' => 'user',
                'status' => 1, // 1 = active, 0 = inactive
                'email_verified_at' => now(), // Mark as verified since OTP is verified
            ]);

            return [
                'success' => true,
                'message' => 'Registration completed successfully.',
                'user' => $user,
            ];
        } catch (\Exception $e) {
            Log::error('Registration OTP Verification Error: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to complete registration. Please try again.',
            ];
        }
    }

    /**
     * Verify OTP and complete login
     */
    public function verifyLoginOtp($email, $otpCode)
    {
        try {
            // Verify OTP
            if (! Otp::verify($email, $otpCode, 'login')) {
                return [
                    'success' => false,
                    'message' => 'Invalid or expired OTP.',
                ];
            }

            // Get user
            $user = User::where('email', $email)->first();
            if (! $user) {
                return [
                    'success' => false,
                    'message' => 'User not found.',
                ];
            }

            // Check if user is active
            if (! $user->isActive()) {
                return [
                    'success' => false,
                    'message' => 'Your account is inactive. Please contact support.',
                ];
            }

            return [
                'success' => true,
                'message' => 'Login successful.',
                'user' => $user,
            ];
        } catch (\Exception $e) {
            Log::error('Login OTP Verification Error: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to complete login. Please try again.',
            ];
        }
    }

    /**
     * Resend OTP
     */
    public function resendOtp($email, $type = 'registration')
    {
        try {
            // Check for recent OTP requests (prevent spam)
            $recentOtp = Otp::where('email', $email)
                ->where('type', $type)
                ->where('created_at', '>', now()->subMinutes(1))
                ->first();

            if ($recentOtp) {
                return [
                    'success' => false,
                    'message' => 'Please wait before requesting another OTP.',
                ];
            }

            if ($type === 'registration') {
                return $this->sendRegistrationOtp($email);
            } else {
                return $this->sendLoginOtp($email);
            }
        } catch (\Exception $e) {
            Log::error('Resend OTP Error: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to resend OTP. Please try again.',
            ];
        }
    }

    /**
     * Send OTP via email
     */
    private function sendOtpEmail($email, $otpCode, $type)
    {
        $subject = $type === 'Registration' ? 'Verify Your Registration - Handyvibe' : 'Your Login OTP - Handyvibe';

        Mail::raw($this->getOtpEmailTemplate($otpCode, $type), function ($message) use ($email, $subject) {
            $message->to($email)
                ->subject($subject);
        });
    }

    /**
     * Get OTP email template
     */
    private function getOtpEmailTemplate($otpCode, $type)
    {
        $action = $type === 'Registration' ? 'complete your registration' : 'log in to your account';

        return "
Hello!

Your OTP for {$action} is: {$otpCode}

This OTP is valid for 10 minutes.

If you didn't request this OTP, please ignore this email.

Best regards,
The Handyvibe Team
        ";
    }
}
