@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7"> 
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>
        <div class="col-5 d-flex">
            <img src="/storage/{{$post->user->profile->image}}" alt="" class="rounded-circle " style="max-width:45px; max-height:50px;">
            <div class="pl-3">
                <div class="h5 d-flex">
                    <div><a class="text-dark" href="/profile/{{$post->user->id}}">{{ $post->user->username}}</a>  </div>|
                    <follow-button userid="{{$post->user->id}}"></follow-button>
                </div> 
                
                <p>{{$post->caption}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
 