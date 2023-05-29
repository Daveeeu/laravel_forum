<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


public function getpost($id)
{
    $post = Post::find($id);
    if(!$post) return redirect()->to('/')->withErrors('Ez a poszt nem létezik!');
    
    return view('layouts.partials.onepost', compact('post'));
}



public function store(Request $request)
{

    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    
    $userid = auth()->user()->id;
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->authorid = $userid;
    $post->save();
    
    return redirect()->to('/')->with('success', "Sikeresen létrehoztad.");



}


    public function delete($id){
        $isAdmin = Auth::check() && Auth::user()->isAdmin();
        $post = Post::findOrFail($id);
        if($isAdmin || $post->authorid === auth()->user()->id){
            $post->delete();
            return redirect()->to('/')->with('success', "Sikeresen törölted.");
        }else{
            return redirect()->to('/')->withErrors('Nincs jogod a törléshez!');
        }


    }

    public function like($id)
    {
        $post = Post::findOrFail($id);
    
        if (!auth()->user()->likedPosts->contains($post->id)) {
            $post->likes()->attach(auth()->user()->id);
        }
        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        if (auth()->user()->likedPosts->contains($post->id)) {
            $post->likes()->detach(auth()->user()->id);
        }
        return redirect()->back();
    }
}
