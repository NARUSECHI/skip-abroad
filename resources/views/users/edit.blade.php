@extends('layouts.app')

@section('title','Edit Profile')

@section('content')
<form action="{{ route('profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- エラーを表示 --}}
    <label for="country">滞在国</label>
    <select name="country" id="country" class="form-select" value="{{old('country',$user->country)}}">
        <option value="" hidden>--</option>
        <option value="Australia">Australia</option>
        <option value="Canada">Canada</option>
        <option value="New Zealand">New Zealand</option>
    </select>
    <label for="stay_year">滞在期間</label>
    <input type="number" name="stay_year" id="stay_year" value="{{old('stay_year',$user->stay_year)}}">年  
    <input type="number" name="stay_month" value="{{old('stay_month',$user->stay_month)}}">ヶ月
    <label for="avatar_name">アバター名</label>
    <input type="text" name="avatar_name" id="avatar_name" value="{{old('avatar_name',$user->avatar_name)}}">
    <label for="avatar_image">アバター画像</label>
    <input type="file" name="avatar_image" id="avatar_image" value={{'avatar_image',$user->avatar_image}}>
    <label for="avatar_intruduction">自己紹介</label>
    <textarea name="avatar_introduction" id="avatar_introduction" rows="10">{{old('avatar_introduction',$user->avatar_introduction)}}</textarea>
    <label for="stay_year">年齢</label>
    <input type="age" name="age" id="age" value="{{old('age',$user->age)}}">年  
    <label for="gender">性別</label>
    <select name="gender" id="gender" class="form-select" value="{{old('gender',$user->gender)}}">
        <option value="" hidden>--</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
    </select>
    <button type="button" class="btn btn-secondary">キャンセル</button>
    <button type="submit" class="btn btn-primary">変更を保存</button>
</form>
@endsection