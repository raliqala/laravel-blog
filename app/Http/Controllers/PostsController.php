<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Post::where('title', 'Post one')->get();
        //$posts = DB::select('SELECT * FROM posts ORDER BY title DESC');
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();
        //$posts = Post::orderBy('title', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(8);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $success = "Post created successfully";

       $this->validate($request, [
           'title' => 'required',
           'body'  => 'required',
           'cover_image' => 'image|nullable|max:1999'
       ]);

       //handle file upload
       if ($request->hasFile('cover_image')) {
           //get filename with extension
           $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
          //get file name
          $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          //get file ext
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          //file name to store
          $fileToStore = $filename."_".time().".".$extension;
          //upload image
          $path = $request->file('cover_image')->storeAs('public/cover_images', $fileToStore);
          
       }else{
           $fileToStore = "noimage.jpg";
       }

       //create post
       $post = new Post;
       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->user_id = auth()->user()->id;
       $post->cover_image = $fileToStore;
       $post->save();

       return redirect('/posts')->with('success', $success);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
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
        $success = "Post updated successfully";

       $this->validate($request, [
           'title' => 'required',
           'body'  => 'required'
       ]);

       //handle file upload
       if ($request->hasFile('cover_image')) {
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get file ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileToStore = $filename."_".time().".".$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileToStore);
        }

       //create post
       $post = Post::find($id);
       $post->title = $request->input('title');
       $post->body = $request->input('body');
       //die(print_r($fileToStore,true));
       if ($request->hasFile('cover_image')){
        $post->cover_image = $fileToStore;
       }
       $post->save();

       return redirect('/posts')->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = "Post deleted successfully";
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if ($post->cover_image != "noimage.jpg") {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();

        return redirect('/posts')->with('success', $success);
    }
}
