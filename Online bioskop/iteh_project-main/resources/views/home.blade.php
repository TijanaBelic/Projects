@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p style=" margin-left: auto;font-size:23px; text-align: center; margin-bottom:0.3%">Welcome,
                            {{ Auth::user()->name }}!</p> <br>
                        <hr style="margin-bottom: 0.3%">

                        <table class="table table-striped" style="margin-left: auto;margin-right:auto;width:26%">
                            @if (count($posts) > 0)
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td style="font-size:15px; margin-bottom:0.3%; white-space: nowrap">{{ $post->title }}</td>

                                        <td><a class='bg-gray-200 hover:bg-green-700 hover:text-white border border-gray-400 text-red-400 font-bold py-2 px-5 rounded-lg'
                                                href="/posts/{{ $post->id }}">View</a></td>
                                        <td><a class='bg-gray-200 hover:bg-yellow-400 hover:text-white border border-gray-400 text-red-400 font-bold py-2 px-5 rounded-lg'
                                                href="/posts/{{ $post->id }}/edit">Edit</a></td>
                                        <td>
                                            {{ Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => '']) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class' => 'bg-gray-200 hover:bg-red-700 hover:text-white border border-gray-400 text-red-400 font-bold py-2 px-5 rounded-lg']) }}
                                            {{ Form::close() }}
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        @if (count($posts) == 0)
                            <p style="margin-left: 43%; font-size:30px; margin-top:4%">You have no posts!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
