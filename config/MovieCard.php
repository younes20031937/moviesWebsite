<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MovieCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $movie;
    public $genres;
    public function __construct($movie , $genres)
    {
        $this-> movie = $movie;
        $this-> genres = $genres;   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movie-card');
    }
}
