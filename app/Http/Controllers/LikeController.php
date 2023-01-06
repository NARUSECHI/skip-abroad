<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    private $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    public function store($id)
    {
        $this->like->user_id = Auth::user()->id;
        $this->like->post_id = $id;

        $this->like->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->like->where('user_id',Auth::user()->id)
                    ->where('post_id',$id)
                    ->delete();
        return redirect()->back();
    }
}
