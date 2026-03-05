<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('superadmin.auth.login'); // create this Blade file
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt login and check if the user has role_id = 1 (super admin)
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role()->where('role_id', 1)->exists()) {
                $request->session()->regenerate();
                return redirect()->intended(route('superadmin.dashboard'));
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Unauthorized.']);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('superadmin.login');
    }
}
