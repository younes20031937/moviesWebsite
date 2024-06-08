<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\Paginator;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::all();
        $users = User::paginate(5);

        return view("auth.users.index", compact("users" ));
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
        ], [
            "name" => "This field is required",
            "avatar" => "You have to upload image like .png , .jpg or .jpeg",
            "email" => "Email adress is required",
            "password" => "This field is required",
            "confirm-password" => "Confirm password to create user",
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
        ], [
            "avatar" => "You have to select files as .png , .jpg or .jpeg",
            "email" => "This email used before"
        ]);
        $data = $request->except("avatar", "isAdmin");
        $data["isAdmin"] = $request->has("isAdmin") ? 1 : 0;
        if ($request->hasFile("avatar")) {
            $newAvatarName = time() . "-" . $request->name . "." . $request->avatar->extension();
            $request->avatar->move(public_path("images/avatars"), $newAvatarName);
            $data["avatar"] = $newAvatarName;
        } else {
            $data = $request->except("avatar");
        }
        $user->update($data);
        return redirect()->route("users.index")->with("message", "User updated successfully");
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("message", "User deleted successfully");
    }
    public function exportPdf()
    {
        $users = User::all();

        $pdf = PDF::loadView('auth.users.pdf', compact('users'));

        return $pdf->save(public_path('my_stored_file.pdf'))->stream('users.pdf');
    }
}
