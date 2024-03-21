<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function index($page = 1)
    {
        $popularActors = Http::withToken(config("services.tmdb.token"))
            ->get("https://api.themoviedb.org/3/person/popular?page={$page}")
            ->json()["results"];
        return view("actors.index",
            [
                "popularActors" => $popularActors,
            ]
        );

    }
    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id)
            ->json();

        $dateOfBirth = Carbon::parse($actor["birthday"]);
        $age = $dateOfBirth->age;

        $social = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/external_ids')
            ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/combined_credits')
            ->json()["cast"];
            //dd($credits);
        return view("actors.show", [
            "actor" => $actor,
            "age" =>$age,
            "social" => $social,
            "credits" => $credits,
        ]);
    }
}
