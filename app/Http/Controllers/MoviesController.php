<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovies = Http::withToken(config("services.tmdb.token"))
            ->get("https://api.themoviedb.org/3/movie/popular")
            ->json()["results"];

        $genresArray = Http::withToken(config("services.tmdb.token"))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()["genres"];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre["id"] => $genre["name"]];
        });
        $nowPlaying = Http::withToken(config("services.tmdb.token"))
            ->get("https://api.themoviedb.org/3/movie/now_playing")
            ->json()["results"];
        //dump($nowPlaying);
        return view("index", [
            "popularMovies" => collect($popularMovies)->take(7),
            "genres" => $genres,
            "nowPlaying" => $nowPlaying,
        ]);
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
    public function show(string $id)
    {
        $movie = Http::withToken(config("services.tmdb.token"))
            ->get("https://api.themoviedb.org/3/movie/{$id}?api_key=464c162e87780355ee8852899448a1dc&append_to_response=credits,videos,images")
            ->json();
        //dump($movie);
        return view("show", [
            "movie" => $movie,
        ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
