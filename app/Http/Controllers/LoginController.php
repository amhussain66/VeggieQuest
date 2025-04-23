<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show admin login page or redirect if already logged in
    public function adminLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::check()) {
                    // Redirect to admin dashboard after successful login
                    return redirect()->route('admin.dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid Email or Password!');
            }
        } else {
            if (Auth::check()) {
                // Already logged-in admins get redirected
                return redirect()->route('admin.dashboard');
            } else {
                return view('admin.login');
            }
        }
    }

    // Logout admin
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
