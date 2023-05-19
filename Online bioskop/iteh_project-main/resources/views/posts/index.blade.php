@extends('layouts.main')

@section('content')
    <div class="container-md">
        <br>
        <h1 class="uppercase tracking-wider text-red-400 text-lg font-semibold">Posts</h1>
        <br>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">

        @if (count($posts) > 0)

            @foreach ($posts as $post)

                <div class="card p-3 mt-3 mb-3 bg-gray-900">

                    <div class="row">
                        <h3 style="margin-bottom:3px"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                        <div class="col-md-4 col-sm-4">
                            <a href="/posts/{{ $post->id }}">

                            <img class="rounded" style="width:75%; height: 150px" src="/storage/cover_images/{{ $post->cover_image }}"></a>
                        </div>
                        <div class="col-md-8 col-sm-4">
                            <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
            {{ $posts->links() }}
    </div>
    <div>

        <br><br><br>

    </div>
@else
    <p>No posts found</p>
    @endif
@endsection
