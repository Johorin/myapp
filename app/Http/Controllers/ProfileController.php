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
        //初めにログインユーザーの旧プロフィールデータを削除する処理
        // Profile::table('profile')->truncate();
        Profile::where('id', Auth::id())->delete();
        
        //次に新しいデータを保存する処理
        //editリクエストの内容を全て$inputに格納
        $input = $request['edit'];
        //$pathに画像のパスを記述
        $path = $request->file->store('public');    //画像ファイルが生成される&pathにフォルダのパスが記述される
        //追加でuser_idをprofileテーブルに保存
        $input += ['user_id' => Auth::id()];
        //追加でicon_image（画像のパス）をprofileテーブルに保存
        $input += ['icon_image' => $path];
        $profile->fill($input)->save();
        return redirect('/');
    }
}
