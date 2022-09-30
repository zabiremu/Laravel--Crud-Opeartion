<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForntEndController extends Controller
{
    // show post data

    public function index(){
        $post = Post::all();
        return view('welcome', compact('post'));
    }

    public function Post(Post $post){
        // $post->increment('view');
        $sessionName = "post-view" . $post->id;
        if(!Session::has($sessionName)){
            $post->increment('view');
            Session::put($sessionName, true);
        }
        return view('Post', compact('post'));
    }
}
