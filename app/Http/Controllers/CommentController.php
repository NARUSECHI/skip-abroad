<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($post_id,Request $request)
    {
        $request ->validate([
            'body'.$post_id => 'required|max:400'
        ],
        [
            'body'.$post_id.'.required' => 'Cannot submit an empty comment.',
            'body'.$post_id.'.max:400' => 'The comment must not be greater than 400 characters.'
        ]);

        $this->comment->body = $request->input('body'.$post_id);
        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $post_id;
        $this->comment->save();
        return redirect()->back();
    }
}
