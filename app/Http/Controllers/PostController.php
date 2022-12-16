<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    const LOCAL_STORAGE_FOLDER ='public/images';
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = $this->post;
        $post->image = $this->saveImage($request);
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('index');
    }

    public function saveImage($request)
    {
        $image_name=time().".".$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
        return $image_name;
    }
    
}
