<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Send OTP for registration.
     */
    public function sendRegistrationOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'nullable|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $result = $this->otpService->sendRegistrationOtp($request->email, $request->mobile);

        if ($result['success']) {
            // Store user data in session
            session(['user_data' => [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'password' => $request->password,
            ]]);

            return redirect()->route('otp.verify')
                ->with('success', $result['message'])
                ->with('email', $request->email)
                ->with('type', 'registration');
        }

        return redirect()->back()
            ->withErrors(['email' => $result['message']])
            ->withInput();
    }

    /**
     * Verify OTP and complete registration.
     */
    public function verifyRegistrationOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get user data from session
        $userData = session('user_data');
        if (!$userData) {
            return redirect()->route('register')
                ->withErrors(['email' => 'Session expired. Please register again.']);
        }

        $result = $this->otpService->verifyRegistrationOtp($request->email, $request->otp, $userData);

        if ($result['success']) {
            // Clear session data
            session()->forget('user_data');
            Auth::login($result['user']);
            return redirect('/')->with('success', 'Registration completed successfully!');
        }

        return redirect()->back()
            ->withErrors(['otp' => $result['message']])
            ->withInput();
    }

    /**
     * Send OTP for login.
     */
    public function sendLoginOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $result = $this->otpService->sendLoginOtp($request->email);

        if ($result['success']) {
            return redirect()->route('otp.verify')
                ->with('success', $result['message'])
                ->with('email', $request->email)
                ->with('type', 'login');
        }

        return redirect()->back()
            ->withErrors(['email' => $result['message']])
            ->withInput();
    }

    /**
     * Verify OTP and complete login.
     */
    public function verifyLoginOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $result = $this->otpService->verifyLoginOtp($request->email, $request->otp);

        if ($result['success']) {
            Auth::login($result['user']);
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login successful!');
        }

        return redirect()->back()
            ->withErrors(['otp' => $result['message']])
            ->withInput();
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show OTP verification form.
     */
    public function showOtpVerification()
    {
        return view('auth.otp-verify');
    }

    /**
     * Resend OTP.
     */
    public function resendOtp(Request $request)
    {
        $email = $request->email;
        $type = $request->type ?? 'registration';

        $result = $this->otpService->resendOtp($email, $type);

        if ($result['success']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->withErrors(['otp' => $result['message']]);
    }

}
