<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {


        $messages = [
            'name.required' => 'Name is required',
            'name.string'   => 'Name must be a string',
            'name.max'      => 'Name cannot exceed 255 characters',

            'email.required' => 'Email is required',
            'email.email'    => 'Email must be a valid email address',
            'email.unique'   => 'Email is already taken',

            'mobile.string' => 'Mobile number must be a string',
            'mobile.max'    => 'Mobile number cannot exceed 20 characters',

            'password.required'  => 'Password is required',
            'password.string'    => 'Password must be a string',
            'password.min'       => 'Password must be at least 6 characters',
            'password.confirmed' => 'Password confirmation does not match',

            'company_id.integer' => 'Company ID must be an integer',
            'company_id.exists'  => 'Company does not exist',

            'status.string' => 'Status must be a string',
            'status.in'     => 'Status must be either active or inactive',

            'role_id.required' => 'Role is required',
            'role_id.exists'   => 'Role does not exist',
        ];

        try {
            // Validate request
            $data = $request->validate([
                'name'       => 'required|string|max:255',
                'email'      => 'required|email|unique:users,email',
                'mobile'     => 'nullable|string|max:20',
                'password'   => 'required|string|min:6|confirmed',
                'company_id' => 'nullable|integer|exists:companies,id',
                'status'     => 'nullable|string|in:active,inactive',
                'role_id'    => 'required|integer|exists:roles,id',
            ], $messages);

            // Create user
            $user = User::create([
                'name'       => $data['name'],
                'email'      => $data['email'],
                'mobile'     => $data['mobile'] ?? null,
                'password'   => $data['password'], // model will hash
                'company_id' => $data['company_id'] ?? null,
                'status'     => $data['status'] ?? 'active',
            ]);

            // Assign role
            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => $data['role_id'],
            ]);

            // Generate token
            $token = $user->createToken('auth_token')->plainTextToken;

            // Load company and role
            $user->load('company.sector', 'role');

            return response()->json([
                'status'  => true,
                'message' => 'Registration successful',
                'token'   => $token,
                'user'    => $user,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        }
    }


    // LOGIN
    public function login(Request $request)
    {
        $messages = [
            'email.required'    => 'Email is required',
            'email.email'       => 'Email must be a valid email address',
            'password.required' => 'Password is required',
            'password.string'   => 'Password must be a string',
        ];

        try {
            $data = $request->validate([
                'email'    => 'required|email',
                'password' => 'required|string',
            ], $messages);

            $user = User::where('email', $data['email'])->with('role')->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'The provided credentials are incorrect.'
                ], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status'  => true,
                'message' => 'Login successful',
                'token'   => $token,
                'user'    => $user,

            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);
        }
    }

    // CURRENT USER
    public function me(Request $request)
    {
        $user = $request->user()->load('role');

        // Default response
        $responseUser = $user->toArray();

        // If company admin, load company details
        if ($user->role && $user->role->id == 3) {
            $user->load('company.sector');
            $responseUser['company'] = $user->company;
        } else {
            $responseUser['company'] = null;
        }

        return response()->json([
            'status' => true,
            'user'   => $responseUser
        ]);
    }


    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Logged out successfully'
        ]);
    }
}
