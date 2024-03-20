@extends('layouts.main')

@section('popularActors')
    <div class="container mx-auto px-4 pt-16 ">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">
                Popular Actors
            </h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16 ">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8 rounded-lg">
                        <a href="#">
                            <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $actor['profile_path'] }}"
                                alt="" class="hover:opacity-75 transition ease-in-out duration-150 rounded-t-lg">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm-truncate text-gray-400">
                                @foreach ($actor['known_for'] as $media)
                                    @if ($media['media_type'] == 'movie')
                                        {{ $media['title'] }}
                                    @else
                                        {{ $media['name'] }}
                                    @endif
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
