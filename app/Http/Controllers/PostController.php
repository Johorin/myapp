<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(PostModel $post)
    {
        // return $post->get();
        return view('home/index')->with(['posts' => $post->getByLimit()]);
    }
    
    public function create()
    {
        return view('create/create');
    }
    
    public function store(PostRequest $request, PostModel $post)
    {
        $input = $request['post'];
        // 追加でuser_idをpostsテーブルに保存
        $input += ['user_id' => Auth::id()];
        // 追加でnum_likesをpostsテーブルに保存
        $input += ['num_likes' => mt_rand(3000, 50000)];
        
        $post->fill($input)->save();
        return redirect('/');
    }
}
