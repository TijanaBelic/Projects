@extends('layouts.main')

@section('content')

    <div class="container mx-auto  px-4  pt-16">
        <div class="popular-movies">

            <h2 class="uppercase tracking-wider text-red-400 text-lg font-semibold">Popular Movies</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($popularMovies as $movie)

                    <x-movie-card :movie='$movie' :genres='$genres' />
                @endforeach
            </div>

            <br>
            <br>
            <h2 class="uppercase tracking-wider text-red-400 text-lg font-semibold">Top Movies</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($topMovies as $movie)
                    <x-movie-card :movie='$movie' :genres='$genres' />
                @endforeach
            </div>

            <br>
            <br>
            <h2 class="uppercase tracking-wider text-red-400 text-lg font-semibold">Horror Movies</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($horrorMovies as $movie)
                    <x-movie-card :movie='$movie' :genres='$genres' />
                @endforeach
            </div>



        </div>
    </div>

@endsection
