<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        // $avatarsPath = public_path("images/avatars");
        // $avatars = File::files($avatarsPath);
        // $avatarFiles = [];
        // foreach($avatarFiles as $avatar){
        //     $avatarFiles[]= "images/avatars/" . $avatar->getFilename();
        // }
        return view("auth.register");
    }
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "avatar" => "mimes:png,jpg,jpeg",
            "email" => "required",
            "password" => "required"
        ]);

        if ($request->hasFile("avatar")) {
            $newAvatarName = time() . "-" . $request->name . "." . $request->avatar->extension();
            $request->avatar->move(public_path("images/avatars"), $newAvatarName);
            User::create([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password"=>$request->input("password"),
                "avatar" => $newAvatarName,
            ]);
        }
        else{
            User::create([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password"=>$request->input("password"),
            ]);
        }

        // User::create([
        //     'name' => $request->name,
        //     "avatar"=>$this->storeAvatar($request),
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        return redirect("/login");
    }
    private function storeAvatar($request)
    {
        $newAvatar = uniqid() . "." . $request->title . "." . $request->avatar->extension();
        return $request->avatar->move(public_path("images/avatars") . $newAvatar);
    }
}
