<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Organization;
use App\Models\OrganizationPasswordReset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

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
            'password' => 'required',
        ]);

      if (Auth::guard('organization')->attempt([
    'work_email' => $request->email,
    'password' => $request->password,
])) {

    $organization = Auth::guard('organization')->user();

    // BLOCK UNVERIFIED EMAIL
    if (! $organization->email_verified_at) {
        Auth::guard('organization')->logout();

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Please verify your email before logging in.');
    }

    $request->session()->regenerate();

    return redirect()
        ->route('dashboard')
        ->with('success', 'Login successful');
}

        return back()
            ->withInput($request->only('email')) // keeps email in form
            ->with('error', 'Invalid email or password.');
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
            'email' => 'required|email',
        ]);

        

        $organization = Organization::where('work_email', $request->email)->first();



        if (! $organization) {
            return back()->with('error', 'Account not found.');
        }

        if (! $organization->email_verified_at) {
    return redirect()
        ->route('login')
        ->with('error', 'Please verify your email before logging in.');
}

        $otp = random_int(100000, 999999);
        $expiryMinutes = 10;

        $organization->update([
            'otp_code' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes($expiryMinutes),
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
        if (! session('login_email')) {
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
            'otp' => 'required|digits:6',
        ]);

        $email = session('login_email');

        if (! $email) {
            return redirect()
                ->route('login')
                ->with('error', 'Session expired.');
        }

        $organization = Organization::where('work_email', $email)->first();

        if (! $organization) {
            return redirect()
                ->route('login')
                ->with('error', 'Account not found.');
        }

        if (! $organization->otp_code) {
            return back()->with('error', 'OTP not generated.');
        }

        if ($organization->otp_code != $request->otp) {
            return back()->with('error', 'Incorrect verification code. Enter the correct code to complete verification.');
        }

        if (Carbon::now()->gt($organization->otp_expires_at)) {
            return back()->with('error', 'OTP expired.');
        }

        Auth::guard('organization')->login($organization);
        $request->session()->regenerate();

        // Clear OTP
        $organization->update([
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        session()->forget('login_email');

        return redirect()
            ->route('dashboard')
            ->with('success', 'Login successful');
    }

    /*
    |--------------------------------------------------------------------------
    | RESEND LOGIN OTP
    |--------------------------------------------------------------------------
    */

    public function resendLoginOtp()
    {
        $email = session('login_email');

        if (! $email) {
            return redirect()->route('login');
        }

        $organization = Organization::where('work_email', $email)->first();

        if (! $organization) {
            return redirect()->route('login');
        }

        $otp = random_int(100000, 999999);
        $expiryMinutes = 10;

        $organization->update([
            'login_otp' => $otp,
            'login_otp_expires_at' => Carbon::now()->addMinutes($expiryMinutes),
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

        return redirect()
            ->route('login')
            ->with('success', 'Logged out successfully');
    }


public function forgotPassword()
{
    return view('auth.forgot-password');
}

public function sendResetLink(Request $request)
{
    $request->validate([
        'work_email' => ['required', 'email']
    ]);

    $organization = Organization::where(
        'work_email',
        $request->work_email
    )->first();

    if (!$organization) {
        return back()->withErrors([
            'work_email' => 'No account found with this email address.'
        ])->withInput();
    }

    $token = Str::random(64);

    OrganizationPasswordReset::updateOrCreate(
        [
            'organization_id' => $organization->id,
        ],
        [
            'token'      => $token,
            'expires_at' => now()->addMinutes(30),
        ]
    );

    $resetUrl = route('password.reset.form', [
        'token' => $token
    ]);

    Mail::to($organization->work_email)
        ->send(new ResetPasswordMail($resetUrl));

    return back()->with(
        'success',
        'Password reset link has been sent to your email.'
    );
}


public function showResetForm($token)
{
    $reset = OrganizationPasswordReset::where('token', $token)
        ->first();

    if (!$reset) {
        return redirect()
            ->route('forgot.password')
            ->withErrors([
                'email' => 'Invalid password reset link.'
            ]);
    }

    if ($reset->expires_at->isPast()) {

        $reset->delete();

        return redirect()
            ->route('forgot.password')
            ->withErrors([
                'email' => 'Password reset link has expired.'
            ]);
    }

    return view('auth.reset-password', compact('token'));
}
public function resetPassword(Request $request)
{
    $request->validate([
        'token' => ['required'],
        'password' => ['required', 'min:8', 'confirmed'],
    ]);

    $reset = OrganizationPasswordReset::where(
        'token',
        $request->token
    )->first();

    if (!$reset) {
        return redirect()
            ->route('forgot.password')
            ->withErrors([
                'email' => 'Invalid password reset link.'
            ]);
    }

    if ($reset->expires_at->isPast()) {

        $reset->delete();

        return redirect()
            ->route('forgot.password')
            ->withErrors([
                'email' => 'Password reset link has expired.'
            ]);
    }

    $organization = Organization::find($reset->organization_id);

    if (!$organization) {

        $reset->delete();

        return redirect()
            ->route('forgot.password')
            ->withErrors([
                'email' => 'Organization not found.'
            ]);
    }

    $organization->update([
        'password' => Hash::make($request->password),
    ]);

    $reset->delete();

    return redirect()
        ->route('login')
        ->with('success', 'Password has been reset successfully.');
}
}
