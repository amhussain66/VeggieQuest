<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\UsersLoginHistory;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function adminLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

                if (Auth::check()) {

                    return redirect(RouteServiceProvider::ADMIN);

                }

            } else {
                return redirect()->back()->with('error', 'Invalid Email or Password !');
            }
        } else {

            if (Auth::check()) {
                return redirect(RouteServiceProvider::ADMIN);
            } else {
                return view('admin.login');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route("admin.login");
    }
}
