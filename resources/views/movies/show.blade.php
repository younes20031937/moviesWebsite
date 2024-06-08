@extends('layouts.main')

@section('show')
    <div class="border-b border-gray-800 movie-info">
        <div class="container flex flex-col px-4 py-16 mx-auto md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-sm text-gray-400">
                    <svg style="color: orange" class="w-6 h-6 text-orange-500 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                    </svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }} @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>
                <p class="mt-8 text-gray-300">{{ $movie['overview'] }}</p>
                <div class="mt-12">
                    <h4 class="font-semibold text-white">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @else
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
            <div x-data="{ isOpen: false }">
                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <button target="_blank" @click="isOpen = true"
                            href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                            class="inline-flex items-center px-5 py-4 font-semibold text-gray-900 bg-orange-500 rounded transition duration-150 ease-in-out hover:bg-orange-600">
                            <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 18V6l8 6-8 6Z" />
                            </svg>
                            <div class="ml-2">Play Trailer</div>
                        </button>
                    </div>
                @endif
                <div style="background-color: rgba(0, 0, 0, .5);"
                    class="flex overflow-y-auto fixed top-0 left-0 items-center w-full h-full shadow-lg"
                    x-show.transition.opacity="isOpen">
                    <div class="container overflow-y-auto mx-auto rounded-lg lg:px-32">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pt-16 pr-4">
                                <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                </button>
                            </div>
                            <div class="px-8 py-8 modal-body">
                                <div class="overflow-hidden relative responsive-container" style="padding-top: 56.25%">
                                    @if(isset($movie['videos']['results'][0]['key']))
                                    <iframe class="absolute top-0 left-0 w-full h-full responsive-iframe"
                                        src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                        style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="border-b border-gray-800 movie-cast">
    <div class="container px-4 py-16 mx-auto">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($movie['credits']['cast'] as $cast)
                @if ($loop->index < 5)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w200/' . $cast['profile_path'] }}" alt=""
                                class="rounded transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}"
                                class="mt-2 text-lg hover:text-gray-300">{{ $cast['original_name'] }}</a>
                            <div class="text-sm text-gray-400">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                @else
                @break
            @endif
        @endforeach
    </div>
</div>
</div>

<div class="movie-images" x-data="{ isOpen: false }">
<div class="container px-4 py-16 mx-auto">
    <h2 class="text-4xl font-semibold">Images</h2>
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($movie['images']['backdrops'] as $image)
            @if ($loop->index < 9)
                <div class="mt-8">
                    <a href="#" @click.prevent="isOpen = true">
                        <img src="{{ 'https://image.tmdb.org/t/p/w400/' . $image['file_path'] }}" alt=""
                            class="rounded transition duration-150 ease-in-out hover:opacity-75">
                    </a>
                </div>
            @else
            @break
        @endif
    @endforeach
</div>
<div style="background-color: rgba(0, 0, 0, .5);"
    class="flex overflow-y-auto fixed top-0 left-0 items-center w-full h-full shadow-lg"
    x-show.transition.opacity="isOpen">
    <div class="container overflow-y-auto mx-auto rounded-lg lg:px-32">
        <div class="bg-gray-900 rounded">
            <div class="flex justify-end pt-16 pr-4">
                <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
                    class="text-3xl leading-none hover:text-gray-300">&times;
                </button>
            </div>
            <div class="px-8 py-8 modal-body">
                <div class="overflow-hidden relative responsive-container" style="padding-top: 56.25%">
                    @if(isset($movie['videos']['results'][0]['key']))
                    <iframe class="absolute top-0 left-0 w-full h-full responsive-iframe"
                        src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                        style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
