<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CommonPart($request, $post){
        
        // Database

        $post->titles = $request->title;
        $post->details = $request->detail;
        $post->slug = Str::slug($request->title);
        $post->user = Auth::user()->name;
        $post->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show view page
        $posts = Post::All();
        return view('backend.show',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show the create page 

        return view('backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // from vaildation 

        $request->validate([
            "title" => "required|max:80",
            "detail" => "required|max:500"
        ]);
        $post = new Post();
        $this->CommonPart($request, $post);
        return back();        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // show edit page
        $post = Post::find($id);
        return view('backend.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update from validate
        $request->validate([
            "title" => "required|max:80",
            "detail" => "required|max:500"
        ]);

        $post = Post::findOrFail($id);
        $this->CommonPart($request, $post);
        return back();  

    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }

    public function postStatus($id){
        
        // status update
        $post = Post::findOrFail($id);
        if($post->status == 1){
            $post->status = 0;
        }else{
            $post->status = 1;
        }
        $post->save();
        return back();
    }
}
