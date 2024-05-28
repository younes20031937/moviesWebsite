<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen=false">
    <input wire:model.live="search" type="text" x-ref="search"
        @keydown.window="
        if(event.keyCode == 191){
            $refs.search.focus();
        }
    "
        class="px-4 py-1 pl-2 w-64 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline"
        placeholder="Search" @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen=false">
    <!-- Loading state -->
    <div wire:loading class="absolute top-0 right-0 mt-2 mr-3 text-gray-500">
        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.373A8.005 8.005 0 014.626 7.94l1.932.518A5.998 5.998 0 1010 2.618v-.001L7.067 3.136A7.963 7.963 0 014 12h2zM12 20c2.952 0 5.518-1.655 6.855-4.088l-1.932-.518A5.998 5.998 0 0112 20zm6.855-11.912C17.517 5.654 14.953 4 12 4v2c1.474 0 2.8.8 3.514 2.002l1.932-.518zM10 2.618C7.047 3.381 4.382 5.655 3.145 8.087l1.932.518C6.2 6.801 8.526 5 12 5v-.001L10 2.618z">
            </path>
        </svg>
    </div>
    <!--
    <div class="absolute top-0">
        <svg class="mt-2 ml-2 w-4 text-gray-500 fill-current" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
        </svg>
    </div>
-->
    <div class="absolute z-50 mt-4 w-64 text-sm bg-gray-800 rounded" x-show="isOpen">
        @if ($searchResults->count() === 0 && strlen($search) > 2)
            <div class="px-3 py-3">
                No Results For {{ $search }}
            </div>
        @else
            <ul>
                @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{ route('movies.show', $result['id']) }}"
                            class="flex items-center py-3 hover:bg-gray-700 pc-3">
                            @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="Poster"
                                    class="w-8">
                            @else
                                <img src="{{ asset('images/default_poster.png') }}" alt="Poster" class="w-8">
                            @endif
                            <span class="ml-4">{{ $result['title'] }}
                                ({{ date('Y', strtotime($result['release_date'])) }})
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
