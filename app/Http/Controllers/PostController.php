<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{ 
    public function __construct () { 
        $this->middleware('auth');
    }

    public function index () {
        $user = auth()->user()->following()->pluck('profiles.user_id');
        $posts = POST::whereIn('user_id', $user)->with('user')->latest()->paginate(2);
        return view('post.index', compact('posts'));
    }

    public function create () {
        return view('post.create');
    }

    public function store () {

        $data = request()->validate([
          'caption'=>'required',  
          'image'=>'required|image',  
        ]);
        $imagePath = request('image')->store('uploads', 'public');
       
        auth()->user()->posts()->create([
           'caption' => $data['caption'],
           'image' => $imagePath
        ]);
        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(\App\Post $post) {
      
        return view('post.show', compact('post'));
    }
}
