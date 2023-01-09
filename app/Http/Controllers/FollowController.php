<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    private $follow;

    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }

    public function store($id)
    {
        $this->follow->follower_id =  $id;
        $this->follow->following_id = Auth::user()->id;
        $this->follow->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->follow->where('following_id',Auth::user()->id)->where('followerq_id',$id)->delete();
        return redirect()->back();
    }
}
