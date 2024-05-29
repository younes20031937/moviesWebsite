<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view("profile");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            "name" => "required",
            "email" => "required",
            "avatar" => "mimes:png,jpg,jpeg"
        ]);
        if ($request->hasFile("avatar")) {
            $newAvatarName = time() . "-" . $request->name . "." . $request->avatar->extension();
            $request->avatar->move(public_path("images/avatars"), $newAvatarName);
            $user->update([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "avatar" => $newAvatarName,
            ]);
        }
        else{
            $user->update([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
            ]);
        }
        return redirect("/")->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            "password" => "required",
            "confirm-password" => "required|same:password"
        ]);
        $user->update([
            "password" => Hash::make($request->password)
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login")->with("message", "You have changes your password successfully");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect("/");
    }
}
