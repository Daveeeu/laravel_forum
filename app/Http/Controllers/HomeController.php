<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        $posts = Post::with('author')->with('likes')->paginate(3);

        $isAdmin = Auth::check() && Auth::user()->isAdmin();
        return view('home.index',compact('posts', 'isAdmin'));
    }
}
