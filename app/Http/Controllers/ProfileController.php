<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Profile $profile){
        // $profile = Profile::all();
        // return view('edit_profile.edit')->with('profile_data', $profile);
        $bio_exsist = Profile::where('bio')->first();
        if ($bio_exsist !== null){ // 一言コメントが設定されていればそれを取得してeditビューへ
            $bio = Profile::where('bio')->get();
            return view('edit_profile.edit')->with('bio', $bio);
        } else {    // 一言コメントが設定されていなければそのままeditビューへ
            return view('edit_profile.edit');
        }
    }
    
    public function store(PostRequest $request, Profile $profile)
    {
        $input = $request['edit'];
        //追加でuser_idをprofileテーブルに保存
        $input += ['user_id' => Auth::id()];
        
        $profile->fill($input)->save();
        return redirect('/');
    }
}
