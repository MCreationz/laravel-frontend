<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    // REGISTER COMPANY
    public function register(Request $request)
    {
        $user = $request->user()->load('company.sector', 'role');

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

        $messages = [
            'name.required'                => 'Company name is required',
            'pan_number.required'          => 'PAN number is required',
            'pan_number.unique'            => 'PAN number must be unique',
            'sector_id.exists'             => 'Sector does not exist',
            'address.required'             => 'Address is required',
            'city.required'                => 'City is required',
            'state.required'               => 'State is required',
            'pincode.required'             => 'Pincode is required',
            'contact_person_name.required' => 'Contact person name is required',
            'contact_email.required'       => 'Contact email is required',
            'contact_email.email'          => 'Contact email must be valid',
            'contact_mobile.required'      => 'Contact mobile is required',
        ];

        try {
            $data = $request->validate([
                'name'                => 'required|string|max:255',
                'pan_number'          => 'required|string|max:20|unique:companies,pan_number',
                'gst_number'          => 'nullable|string|max:20',
                'sector_id'           => 'nullable|integer|exists:sectors,id',
                'address'             => 'required|string',
                'city'                => 'required|string|max:100',
                'state'               => 'required|string|max:100',
                'pincode'             => 'required|string|max:10',
                'contact_person_name' => 'required|string|max:255',
                'contact_email'       => 'required|email|max:255',
                'contact_mobile'      => 'required|string|max:20',
            ], $messages);

            // ✅ Create company
            $company = Company::create([
                ...$data,
            ]);

            // ✅ Attach company to user
            $user->company_id = $company->id;
            $user->save();

            // ✅ Assign COMPANY ADMIN role (server-side only)
            DB::table('role_user')->updateOrInsert(
                ['user_id' => $user->id],
                ['role_id' => 3]
            );
            return response()->json([
                'status'  => true,
                'message' => 'Company registered successfully',
                'company' => $company
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        }
    }


    public function addUserToCompany(Request $request)
    {
        $admin = $request->user();

        // Only company admins can add users
        if (!$admin->role || $admin->role->id !== 3 || !$admin->company_id) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $messages = [
            'name.required' => 'Name is required',
            'name.string'   => 'Name must be a string',
            'name.max'      => 'Name cannot exceed 255 characters',

            'email.required' => 'Email is required',
            'email.email'    => 'Email must be valid',
            'email.unique'   => 'Email is already taken',

            'mobile.string' => 'Mobile number must be a string',
            'mobile.max'    => 'Mobile cannot exceed 20 characters',

            'password.required'  => 'Password is required',
            'password.string'    => 'Password must be a string',
            'password.min'       => 'Password must be at least 6 characters',
            'password.confirmed' => 'Password confirmation does not match',

            'role_id.required' => 'Role is required',
            'role_id.exists'   => 'Role does not exist',
        ];

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'mobile'   => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'role_id'  => 'required|integer|exists:roles,id',
        ], $messages);

        // Automatically attach to admin's company
        $data['company_id'] = $admin->company_id;

        // Create user
        $user = User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'mobile'     => $data['mobile'] ?? null,
            'password'   => $data['password'], // model hashes it
            'company_id' => $data['company_id'],
            'status'     => 'active',
        ]);

        // Assign role
        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $data['role_id'],
        ]);

        // Load relations
        $user->load('company.sector', 'role');

        return response()->json([
            'status'  => true,
            'message' => 'User added successfully',
            'user'    => $user,
        ], 201);
    }


    public function getUsers(Company $company)
{
    $users = $company->users()->with('role')->get();

    return response()->json([
        'status' => true,
        'users' => $users,
    ]);
}

}
