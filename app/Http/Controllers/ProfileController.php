<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Http\Requests\EditRequest;
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
    
    public function store(EditRequest $request, Profile $profile)
    {
        //初めにログインユーザーの旧プロフィールデータを削除する処理
        Profile::where('id', Auth::id())->delete();
        
        if ($request->file('file')->isValid([])) {
            //バリデーションを正常に通過した時の処理
            //S3へのファイルアップロード処理の時の情報を変数$upload_infoに格納する
            $upload_info = \Storage::disk('s3')->putFile('/uploadedimage', $request->file('file'), 'public');
            //S3へのファイルアップロード処理の時の情報が格納された変数$upload_infoを用いてアップロードされた画像へのリンクURLを変数$pathに格納する
            $path = \Storage::disk('s3')->url($upload_info);
            
            $profile->id = Auth::id();
            $profile->icon_image = $path;
            $profile->bio = $request['bio'];
            $profile->user_id = Auth::id();
            
            $user = new User();
            $user->name = $request['user_name'];
            
            $profile->save();
            $user->save();
            
            return redirect('/');
        } else {
            //バリデーションではじかれた時の処理
            return redirect('/edit');
        }
    }
}
