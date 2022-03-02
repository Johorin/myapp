<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Likes;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    // // ランダムでいいね数を生成
    // public function grantLikes(Likes $like)
    // {
    //     // mt_rand(3000, 50000);
    //     // $like->fill()
    //     Likes::create([
    //         'user_id' => $like->user()->id,
    //         'posts_id' => $like->post()->id,
    //         'num_likes' => mt_rand(3000, 50000),
    //     ]);
    // }
    public function insertLikes($user_id)
    {
        //likesテーブルに保存する内容
        $input = [
            'user_id' => $user_id,
            'posts_id' => Auth::id(),
            'num_likes' => mt_rand(3000, 50000),
        ];
        
        $like = new Likes();
        
        $like->fill($input)->save();
    }
}
