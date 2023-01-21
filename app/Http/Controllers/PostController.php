<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;

class PostController extends Controller
{
    const LOCAL_STORAGE_FOLDER ='public/images';
    private $post;
    private $comment;

    public function __construct(Post $post,Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    public function index()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:1|max:30',
            'description'=>'required|min:1|max:400',
            'image'=>'required|mimes:jpg,png,jpeg,gif|max:1048'
        ]);

        $post = $this->post;
        $post->image = $this->saveImage($request);
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('index');
    }

    private function saveImage($request)
    {
        $image_name=time().".".$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
        return $image_name;
    }

    public function show($post_id)
    {
        $post = $this->post->findOrFail($post_id);
        $all_comments = $this->comment->latest()->get();
        return view('posts.show')->with('post',$post)->with('all_comments',$all_comments);
    }
    //人気投稿の画像をすり替えられる可能性
    // public function edit($id)
    // {
    //     $post = $this->post->findOrFail($id);
    //     return view('posts.edit')->with('post',$post);
    // }

    // public function update(Request $request,$id)
    // {
    //     $request->validate([
    //         'title'=>'required|min:1|max:30',
    //         'description'=>'required|min:1|max:400',
    //         'image'=>'mimes:jpg,png,jpeg,gif|max:1048'
    //     ]);
        
    //     $post = $this->post->findOrFail($id);
    //     $post->title = $request->title;
    //     $post->description = $request->description;

    //     if($request->image)
    //     {
    //         $this->deleteImage($post->image);
    //         $post->image = $this->saveImage($request);
    //     }
    //     $post->save();

    //     return redirect()->route('posts.show',$id);
    // }

    private function deleteImage($image)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER.$image;

        if(Storage::disk('local')->exists($image_path))
        {
            Storage::disk('local')->delete($image_path);
        }

    }

    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $this->deleteImage($post->image);
        $post->forcedelete();
        return redirect()->route('index');
    }
    
}
