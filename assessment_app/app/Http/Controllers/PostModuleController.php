<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post; 


class PostModuleController extends Controller
{
     //Post Module Main Blade.php View 
     function homepost(){
        $posts = Post::all(); // Fetch all posts from the database
        return view('postmodule.postmain', compact('posts'));
    }

    public function create()
{
    return view('postmodule.postcreate');
}

    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->contents = $request->content;
    $post->user_id = Auth::user()->id; //Based on the one creating the profile
    $post->save();

    return redirect()->route('home-post')->with('success', 'Post created successfully.');
    }
    


    public function edit(Post $post)
    {
        return view('postmodule.postedit', compact('post'));
    }
    
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'contents' => $request->input('contents'),
        ]);
    
        return redirect()->route('home-post')->with('success', 'Post updated successfully.');
    }
    

    


/**
 * Remove the specified resource from storage.
 */
public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('home-post')->with('success', 'Post deleted successfully.');
    }


}
