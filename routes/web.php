<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */


Route::get("/", [MoviesController::class, "index"])->name("movies.index");
Route::get("/movies/{movie}", [MoviesController::class, "show"])->name("movies.show");

Route::get("/actors" , [ActorsController::class , "index"])->name("actors.index");
Route::get("/page/{page?}" , [ActorsController::class,"actors.index"]);
Route::get("/actors/{actor}" , [ActorsController::class , "show"])->name("actors.show");
//login
Route::get("/login" , [LoginController::class, "showLoginForm"])->name("auth.login");
Route::post("/login" , [LoginController::class, "login"])->name("login");
Route::post("/logout" , [LoginController::class, "logout"])->name("logout");

//register
Route::get("/register" , [RegisterController::class, "showRegisterForm"])->name("auth.register");
Route::post("/register" , [RegisterController::class, "register"])->name("register");

//profile :
Route::get("/profile" , [ProfileController::class, "show"])->name("profile.show");
Route::put("/profile" , [ProfileController::class, "update"])->name("profile.update");
Route::put("/updatePassword" , [ProfileController::class, "updatePassword"])->name("profile.updatePassword");
Route::delete("/deleteProfile" , [ProfileController::class, "destroy"])->name("profile.destroy");

// Route::get("/dashboard" , [AdminController::class , "index"])->name("auth.dashboard")->middleware("admin");
Route::middleware(["admin"])->group(function(){
    Route::get("users" , [AdminController::class, "index"])->name("users.index");
    Route::get("users/create" , [AdminController::class, "create"])->name("users.create");
    Route::post("users" , [AdminController::class, "store"])->name("users.store");
    Route::get("users/{id}" , [AdminController::class, "show"])->name("users.show");
    Route::get("users/{id}/edit",[AdminController::class, "edit"])->name("users.edit");
    Route::put("users/{id}" , [AdminController::class, "update"])->name("users.update");
    Route::delete("users/{id}" , [AdminController::class, "destroy"])->name("users.destroy");
});
