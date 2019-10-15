@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3" >
            <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-80"  height="150px" width="150px">
        </div>
        <div class="col-9 ">
            <div class="d-flex justify-content-between align-items-baseline">
            <div class="h4">{{ $user->username }} </div>
            <follow-button userid="{{$user->id}}" follows="{{ $follows }}"></follow-button>
            
            @can('update', $user->profile)
            <a class="" href="/p/create">add new post</a>
            @endcan
            </div>
            @can('update', $user->profile)
            <a class="" href="/profile/{{$user->id}}/edit">Edit</a>
            @endcan
            <div class="d-flex pr-3">
                <div class="pr-5"><strong>{{$postCount}} </strong> Posts</div>
                <div class="pr-5"><strong>{{$followerCount}} </strong> Followers</div>
                <div class="pr-5"><strong>{{$followingCount}} </strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="www.freecodecamp.org">{{ $user->profile->url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4 mb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" alt="" height="200" width="200">
            </a>
        </div>
        @endforeach
        <!-- <div class="col-4"><img src="../images/images.jpg" alt=""></div>
        <div class="col-4"><img src="../images/myimage.jpg" alt=""></div> -->
    </div>
</div>
@endsection
