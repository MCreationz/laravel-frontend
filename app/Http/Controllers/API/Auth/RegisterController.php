<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerStepOne(Request $request)
    {
        $request->validate([
            'organization_name' => 'required|string|max:100',
            'work_email' => 'required|email|max:50|unique:organizations,work_email',
            'role' => 'required|in:funder,fund_seeker',
            'referral_source' => 'nullable|string',
            'password' => 'required|min:8|max:50|confirmed',
            'captcha' => 'required|string|size:6', // implement actual captcha verification separately
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);
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

        return response()->json([
            'res' => 'success',
            'msg' => 'OTP sent to email.',
        ]);
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
}
