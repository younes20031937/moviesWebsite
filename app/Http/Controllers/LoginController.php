<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect("/");
        }
        return back()->withErrors(["email" => "Error in your email or password.Try again !"]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
}
