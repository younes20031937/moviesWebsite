<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function index($page=1)
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
    public function show($actor)
    {
        return view("actors.show");
    }
}
