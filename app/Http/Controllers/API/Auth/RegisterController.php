<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
  use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

public function registerStepOne(Request $request)
{
    try {

        $request->validate([
            'organization_name' => 'required|string|max:100',
            'work_email' => 'required|email|max:50|unique:organizations,work_email',
            'role' => 'required|in:funder,fund_seeker',
            'referral_source' => 'nullable|string',
            'password' => 'required|min:8|max:50|confirmed',
            'captcha' => 'required|string|size:6',
        ]);

    } catch (ValidationException $e) {

        return redirect()->back()
            ->withErrors($e->validator)
            ->withInput();
    }

    $otp = random_int(100000, 999999);
    $expiryMinutes = 10;

    $organization = Organization::create([
        'organization_name' => ucfirst($request->organization_name),
        'work_email' => $request->work_email,
        'role' => $request->role,
        'referral_source' => $request->referral_source,
        'password' => Hash::make($request->password),
        'otp_code' => $otp,
        'otp_expires_at' => Carbon::now()->addMinutes($expiryMinutes),
    ]);

    $this->sendOtpMail($organization, $otp, $expiryMinutes);

    session()->put('email', $organization->work_email);

    return redirect()->route('verify.otp')
        ->with('email', $organization->work_email)
        ->with('success', 'OTP sent to your email.');
}

    private function sendOtpMail($organization, $otp, $expiryMinutes)
    {
        $subject = $organization->role === 'fund_seeker'
            ? 'Your Fundink OTP – Let’s Get You Started'
            : 'Your Fundink OTP – Verify Your Email';

        $body = $organization->role === 'fund_seeker'
            ? view('emails.fund_seeker_otp', compact('organization', 'otp', 'expiryMinutes'))->render()
            : view('emails.funder_otp', compact('organization', 'otp', 'expiryMinutes'))->render();

        // Correct way to send HTML email
        Mail::html($body, function ($message) use ($organization, $subject) {
            $message->to($organization->work_email)
                ->subject($subject);
        });
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $email = session('email') ?? $request->work_email;

        // dd($request->all(),$email);

        if (! $email) {
            return redirect()->route('register')
                ->with('error', 'Session expired. Please register again.');
        }

        $organization = Organization::where('work_email', $email)->first();

        if (! $organization) {
            return redirect()->back()->with('error', 'Organization not found.');
        }

        if ($organization->otp_code != $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP.');
        }

        if (Carbon::now()->gt($organization->otp_expires_at)) {
            return redirect()->back()->with('error', 'OTP expired.');
        }

        // mark verified
        $organization->update([
            'otp_code' => null,
            'otp_expires_at' => null,
            'email_verified_at' => now(),
        ]);

        // optional: clear session email
        session()->forget('email');

        return redirect()->route('login')
            ->with('success', 'Email verified successfully. Please log in.');
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'work_email' => 'required|email',
        ]);

        $organization = Organization::where('work_email', $request->work_email)->first();

        if (! $organization) {
            return response()->json([
                'res' => 'error',
                'msg' => 'Organization not found.',
            ], 404);
        }

        $otp = rand(100000, 999999);
        $expiryMinutes = 10;

        $organization->update([
            'otp_code' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes($expiryMinutes),
        ]);

        $this->sendOtpMail($organization, $otp, $expiryMinutes);

        return response()->json([
            'res' => 'success',
            'msg' => 'OTP resent successfully.',
        ]);

    }
}
