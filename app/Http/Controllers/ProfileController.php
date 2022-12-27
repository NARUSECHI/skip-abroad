<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    const LOCAL_STORAGE_FOLDER ='public/avatars';
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.profile')->with('user',$user);
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.edit')->with('user',$user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'country'=>'required|string',
            'stay_year'=>'required|integer|between:0,3',
            'stay_month'=>'required|integer|between:0,11',
            'avatar_name'=>'required|string|max:15',
            'avatar_image'=>'mimes:jpg,png,jpeg,gif|max:1048|nullable',
            'avatar_introduction'=>'string|max:400|nullable',
            'age'=>'integer|max:100|nullable',
            'gender'=>'integer|min:1|max:2|nullable',
        ]);

        $user = $this->user->findOrFail(Auth::user()->id);
        $user->country = $request->country;
        $user->stay_year = $request->stay_year;
        $user->stay_month = $request->stay_month;
        $user->avatar_name = $request->avatar_name;
        // 写真がリクエストされない場合は下記を実行しない
        $user->avatar_image = $this->saveImage($request);
        // すでに写真が登録されている場合は削除
        $user->avatar_introduction = $request->avatar_introduction;
        $user->age = $request->age;
        $user->gender = $request->gender;

        $user->save();
        return redirect()->route('profile.index',Auth::user()->id);
    }

    private function saveImage($request)
    {
        $image_name=time().".".$request->avatar_image->extension();
        $request->avatar_image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
        return $image_name;
    }

}
