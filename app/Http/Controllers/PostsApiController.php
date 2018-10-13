<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Post;
use DB;
use App\Http\Resources\Post as PostResource;

class PostsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get api posts
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $post = $request->isMethod('put') ? Post::findOrFail($request->post_id) : new Post; // create or update

        $post->id           = $request->input('post_id');
        $post->title        = $request->input('title');
        $post->body         = $request->input('body');
        $post->user_id      = 1;
        $post->cover_image  = 'noimage.jpg';        

        if($post->save()) {
            return new PostResource($post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get post
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->delete()) {
            return new PostResource($post);
        }    
    }
}
