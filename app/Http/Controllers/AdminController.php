<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request)
    {

            $users = User::all();
        

        return view("auth.users.index", compact("users"));
    }
    public function create()
    {
        return view("auth.users.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "avatar" => "mimes:png,jpg,jpeg",
            "email" => "required|unique:users,email",
            "password" => "required",
            "confirm-password" => "required|same:password",
        ]);
        if ($request->hasFile("avatar")) {
            $newAvatarName = time() . "-" . $request->name . "." . $request->avatar->extension();
            $request->avatar->move(public_path("images/avatars"), $newAvatarName);
            $data = $request->except("avatar");
            $data["avatar"] = $newAvatarName;
            User::create($data);
        } else {
            $data = $request->except("avatar");
            User::create($data);
        }
        return redirect()->route("users.index")->with("message", "User added successfully");
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("auth.users.show", compact("user"));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("auth.users.edit", compact("user"));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            "avatar" => "mimes:png,jpg,jpeg",
            "email" => "unique:users,email,"  . $user->id,
        ]);
        if ($request->hasFile("avatar")) {
            $newAvatarName = time() . "-" . $request->name . "." . $request->avatar->extension();
            $request->avatar->move(public_path("images/avatars"), $newAvatarName);
            $data = $request->except("avatar");
            $data["avatar"] = $newAvatarName;
            $user->update($data);
        } else {
            $data = $request->except("avatar");
            $user->update($data);
        }
        return redirect()->route("users.index")->with("message", "User updated successfully");
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("message", "User deleted successfully");
    }
}
