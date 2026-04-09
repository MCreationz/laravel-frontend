<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function registerStepOne(Request $request)
    {

        // return $request->all();
        try {

            $request->validate([
                'organization_name' => 'required|string|max:100',
                'work_email' => 'required|email|max:50', // removed unique
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

        // check existing email
        $existing = Organization::where('work_email', $request->work_email)->first();

        if ($existing) {

            // if already verified → block
            if ($existing->email_verified_at) {
                return redirect()->back()
                    ->withErrors(['work_email' => 'Email already registered and verified.'])
                    ->withInput();
            }

            // use existing record (override)
            $organization = $existing;

        } else {
            // create new instance
            $organization = new Organization;
        }

        $otp = random_int(100000, 999999);
        $expiryMinutes = 10;

        // assign/update fields
        $organization->organization_name = ucfirst($request->organization_name);
        $organization->work_email = $request->work_email;
        $organization->role = $request->role;
        $organization->referral_source = $request->referral_source;
        $organization->password = Hash::make($request->password);
        $organization->otp_code = $otp;
        $organization->otp_expires_at = Carbon::now()->addMinutes($expiryMinutes);

        $organization->save();

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
            'work_email' => 'nullable|email',
        ]);

        $email = $request->work_email ?? session('email');

        if (! $email) {
            return redirect()->route('register')
                ->with('error', 'Session expired. Please register again.');
        }

        $organization = Organization::where('work_email', $email)->first();

        if (! $organization) {
            return redirect()->back()
                ->with('error', 'Organization not found.')
                ->withInput()
                ->with('email', $email);
        }

        // Safety check (you missed this in your original logic)
        if (! $organization->otp_code) {
            return redirect()->back()
                ->with('error', 'OTP not generated.')
                ->withInput()
                ->with('email', $email);
        }

        if ($organization->otp_code != $request->otp) {
            return redirect()->back()
                ->with('error', 'Invalid OTP.')
                ->withInput()
                ->with('email', $email);
        }

        if (Carbon::now()->gt($organization->otp_expires_at)) {
            return redirect()->back()
                ->with('error', 'OTP expired.')
                ->withInput()
                ->with('email', $email);
        }

        // Mark verified + clear OTP
        $organization->update([
            'otp_code' => null,
            'otp_expires_at' => null,
            'email_verified_at' => now(),
        ]);

        // LOGIN USER (this is the key change)
        Auth::guard('organization')->login($organization);

        $request->session()->regenerate();

        session()->forget('email');

        return redirect()
            ->route('dashboard')
            ->with('success', 'Email verified successfully');
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
