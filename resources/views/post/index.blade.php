@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row mb-4 ">
        <div class="col-md-6 offset-3"> 
            <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->image}}" class="w-100" alt=""></a>
        </div>
    </div>
    <div class="row"></div>
        <div class="col-md-6 offset-3">
            <p>{{$post->caption}}</p>
        
        </div>
    </div>
    @endforeach
    <div class="row d-flex justify-content-center">
        <div class="col-6 offset-3"> {{$posts->Links()}}</div>
    </div>
</div>
@endsection
 