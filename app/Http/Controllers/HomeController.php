<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    private $post;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    public function index()
    {
        $all_posts = $this->post->get();
        return view('home')->with('all_posts',$all_posts);
    }

    public function search(Request $request)
    {
        $search_posts = $this->post->where('title','Like','%'.$request->search.'%')->latest()->get();
        return view('posts.search')->with('search',$request->search)->with('search_posts',$search_posts);
    }
}
