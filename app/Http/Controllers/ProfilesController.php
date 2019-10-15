<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{

    // public function __construct
    public function index(\App\User $user)
    {
      $follows = '';
      $follows = (auth()->user())?auth()->user()->following->contains($user->id):false;
      $postCount= Cache::remember('count.posts.'.$user->id, 
                now()->addSeconds(30), 
                function () use ($user) {
                    return $user->posts->count();
                });
      $followerCount = Cache::remember('count.follow.'.$user->id, 
                    now()->addSeconds(30), 
                    function () use ($user){
                    return $user->profile->followers->count();
                });
      $followingCount = Cache::remember('count.following.'.$user->id, 
                  now()->addSeconds(30), 
                  function () use($user){
                  return $user->following->count();
                });
      return view('profile.profile', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));
    }

    public function edit(User $user){
      
      // $this->authorize('update', $user->profile);

      return view('profile.edit', compact('user'));
    }

    public function update (User $user) {
      // $this->authorize('update', $user->profile);     
      $data = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'url' => 'url',
        'image' => '',
      ]);
      if(request()->image){
        $imagePath = request('image')->store('uploads', 'public');
        // $imagePath->save(); 
      }
     
      auth()->user()->profile->update(array_merge(
        $data,
        ['image'=>$imagePath]
      ));

      return redirect("/profile/{$user->id}");
    }
}
