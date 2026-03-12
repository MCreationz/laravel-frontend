<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | PASSWORD LOGIN
    |--------------------------------------------------------------------------
    */

   public function loginWithPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::guard('organization')->attempt([
        'work_email' => $request->email,
        'password' => $request->password
    ])) {

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Invalid email or password.');
}

    /*
    |--------------------------------------------------------------------------
    | OTP LOGIN EMAIL PAGE
    |--------------------------------------------------------------------------
    */

    public function showOtpEmail()
    {
        return view('auth.login-email');
    }


    /*
    |--------------------------------------------------------------------------
    | SEND LOGIN OTP
    |--------------------------------------------------------------------------
    */

    public function sendLoginOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $organization = Organization::where('work_email', $request->email)->first();

        if (!$organization) {
            return back()->with('error', 'Account not found.');
        }

        $otp = random_int(100000, 999999);
        $expiryMinutes = 10;

        $organization->update([
            'login_otp' => $otp,
            'login_otp_expires_at' => Carbon::now()->addMinutes($expiryMinutes)
        ]);

        $this->sendOtpMail($organization, $otp, $expiryMinutes);

        session()->put('login_email', $organization->work_email);

        return redirect()->route('login.otp')
            ->with('success', 'OTP sent to your email.');
    }


    /*
    |--------------------------------------------------------------------------
    | OTP INPUT PAGE
    |--------------------------------------------------------------------------
    */

    public function showOtpForm()
    {
        if (!session('login_email')) {
            return redirect()->route('login');
        }

        return view('auth.login-otp');
    }


    /*
    |--------------------------------------------------------------------------
    | VERIFY LOGIN OTP
    |--------------------------------------------------------------------------
    */

    public function verifyLoginOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $email = session('login_email');

        if (!$email) {
            return redirect()->route('login')
                ->with('error', 'Session expired.');
        }

        $organization = Organization::where('work_email', $email)->first();

        if (!$organization) {
            return redirect()->route('login')
                ->with('error', 'Account not found.');
        }

        if ($organization->login_otp != $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        if (Carbon::now()->gt($organization->login_otp_expires_at)) {
            return back()->with('error', 'OTP expired.');
        }

        Auth::login($organization);

        $organization->update([
            'login_otp' => null,
            'login_otp_expires_at' => null
        ]);

        session()->forget('login_email');

        return redirect()->route('dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | RESEND LOGIN OTP
    |--------------------------------------------------------------------------
    */

    public function resendLoginOtp()
    {
        $email = session('login_email');

        if (!$email) {
            return redirect()->route('login');
        }

        $organization = Organization::where('work_email', $email)->first();

        if (!$organization) {
            return redirect()->route('login');
        }

        $otp = random_int(100000, 999999);
        $expiryMinutes = 10;

        $organization->update([
            'login_otp' => $otp,
            'login_otp_expires_at' => Carbon::now()->addMinutes($expiryMinutes)
        ]);

        $this->sendOtpMail($organization, $otp, $expiryMinutes);

        return back()->with('success', 'OTP resent successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | SEND OTP MAIL
    |--------------------------------------------------------------------------
    */

    private function sendOtpMail($organization, $otp, $expiryMinutes)
    {
        $subject = 'Your Fundink Login OTP';

        $body = view('emails.login_otp', compact('organization', 'otp', 'expiryMinutes'))->render();

        Mail::html($body, function ($message) use ($organization, $subject) {
            $message->to($organization->work_email)
                ->subject($subject);
        });
    }

    public function logout(Request $request)
{
    Auth::guard('organization')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}