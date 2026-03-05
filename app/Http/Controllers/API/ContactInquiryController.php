<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Mail\ContactInquiryThankYouMail;
use App\Mail\ContactInquiryAdminNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactInquiryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organization_name' => 'required|string|max:255',
            'contact_person'    => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'phone'             => 'required|string|max:20',
            'user_type'         => 'required|in:funder,fund-seeker',
            'hear_about_us'     => 'required|string|max:255',
            'requirement'       => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'res' => 'error',
                'msg' => $validator->errors()->first(),
            ], 422);
        }

        try {

            // Store in DB
            $contact = ContactInquiry::create([
                'organization_name' => $request->organization_name,
                'contact_person'    => $request->contact_person,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'user_type'         => $request->user_type,
                'hear_about_us'     => $request->hear_about_us,
                'requirement'       => $request->requirement,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Send Emails
            |--------------------------------------------------------------------------
            */

            // 1. Thank You Email to User
            Mail::to($contact->email)
                ->send(new ContactInquiryThankYouMail($contact));

            // 2. Admin Notification Email
            Mail::to(config('mail.admin_address')) // set in config
                ->send(new ContactInquiryAdminNotificationMail($contact));

            return response()->json([
                'res' => 'success',
                'msg' => 'Inquiry submitted successfully.',
                'data' => $contact,
            ]);

        } catch (\Exception $e) {

            Log::error('Contact Inquiry Error: ' . $e->getMessage());

            return response()->json([
                'res' => 'error',
                'msg' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    public function index()
    {
        $data = ContactInquiry::latest()->paginate(20);

        return response()->json([
            'res' => 'success',
            'data' => $data
        ]);
    }
}