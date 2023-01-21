<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $all_posts = $this->post->withTrashed()->latest()->get();
        return view('admin.posts.posts')->with('all_posts',$all_posts);
    }

    public function hide($id)
    {
        $this->post->findOrFail($id)->delete();
        return redirect()->back();
    }

    public function unhide($id)
    {
        $this->post->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }


}
