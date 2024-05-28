<div class="mt-8">
    <a href="{{route('movies.show' , $movie['id'])}}">
        <img src="{{"https://image.tmdb.org/t/p/w500/".$movie['poster_path']}}" alt="parasite"
            class="hover:opacity-75 transition ease-in-out duration-150 ">
    </a>
    <div class="mt-2">
        <a href="{{route('movies.show' , $movie['id'])}}" class="text-lg-mt-2 hover:text-gray-300">
            {{$movie["title"]}}
        </a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <svg style="color: orange" class="w-6 h-6 text-orange-500 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
            </svg>
            <span class="ml-1">{{$movie["vote_average"] * 10 . "%"}}</span>
            <span class="mx-2">|</span>
            <span>{{$movie["release_date"]}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            @foreach($movie["genre_ids"] as $genre)
                {{$genres->get($genre)}} @if(!$loop->last) , @endif
            @endforeach
        </div>
    </div>
</div>