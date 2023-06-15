<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.showall',  compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('posts.add-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=$request->validate(
            [
                'title'=>'required',
                'description'=>'required',
            ]
          );
          $user_id = Auth::id();
          $post = new Post();
          $post->title = $request->input('title');
          $post->description = $request->input('description');
          $post->user_id = $user_id;
          $post->save();
      
          return redirect('/posts');

        // $record=Post::create($request->all()); 
        // $record->user_id=Auth::user();
        // $post=Post::all();
        // return $post;
     }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        if(Post::find($id)!=null)
        return Post::find($id)->title;
        else 
        return 'No such id';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy( $id)
    // {
    //     $post=Post::find($id);
    //     if($post!=null)
    //     { 
    //         $post->delete();
    //     }
    // return redirect()->route('posts.index');
  
    //     }


    //     public function getall(){
    //         return 'Ok';
    //     }

    public function destroy($id)
{
    $post = Post::find($id);

    if(!$post){
        return response()->json([
            'status' => 404,
            'message' => 'Post not found'
        ], 404);
    }

    $post->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Post deleted successfully'
    ], 200);
}

public function deletedPosts()
{
    $deletedPosts = Post::onlyTrashed()->get();
    return view('posts.deletedPosts', compact('deletedPosts'));
}


public function restore($id)
{
    $post = Post::withTrashed()->find($id);

    if(!$post){
        return response()->json([
            'status' => 404,
            'message' => 'Post not found'
        ], 404);
    }

    $post->restore();

    return response()->json([
        'status' => 200,
        'message' => 'Post restored successfully'
    ], 200);
}
}
