@extends('layouts.main')

@section('content')
<div class="container-md">
    <br>
    <button
        class="flex inline-flex items-center bg-red-400 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
        <a href="/posts" class="ml-2">Go back</a>
    </button>
</div>

<div class="mb-5" style="margin-top: 3.5%;
margin-bottom: 1%;
width: 73.3%;
background: #fc8181;
border-radius: 10px;
margin-left: 26.4vh;
word-wrap: break-word;
vertical-align: top;
text-align: left;
font-size: 24px;
padding-left:3%; 
padding-right:3%">
<div class="mb-7 pt-4 text-4xl" style="text-align:center"><h1>{{$post->title}} <hr></h1></div>
<img class="rounded" style="width:60%;padding-top:3%; margin-left:auto;margin-right:auto" src="/storage/cover_images/{{$post->cover_image}}">
   <!-- <div><img style="box-sizing: border-box; width:100%; height: 300%" src="../storage/cover_images/"></div>  -->
   <br>
    <div class="mb-6">{!! $post->body !!}</div><hr>
    <small style="padding-bottom: 2%; font-size:12px">Posted by {{$post->user->name}} at {{$post->created_at}}</small>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <div class="container-md">
            <br>
            <button
                class="flex inline-flex items-center bg-white text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                <a href="/posts/{{$post->id}}/edit">Edit</a>
            </button>

            {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}

                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>['btn', 'flex', 'inline-flex', 'tems-center','bg-white', 'text-gray-900', 'rounded','font-semibold', 'px-5', 'py-4', 'cursor-pointer','hover:bg-orange-600','transition ease-in-out duration-150']])}}

            {!!Form::close()!!}

        </div>
        @endif
    @endif
<br>

</div>


@endsection
