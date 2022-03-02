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
        return view('home/create');
    }
    
    public function store(PostRequest $request, PostModel $post)
    {
        $input = $request['post'];
        // 追加でuser_idをpostsテーブルに保存
        $input += ['user_id' => $request->user()->id];
        
        // LikesControllerのinsertLikesメソッドを呼び出す
        $insertLikes = app()->make('App\Http\Controllers\LikesController');
        $insertLikes->insertLikes($request->user()->id);
        
        // 追加でlikes_idをpostsテーブルに保存
        // $input += ['likes_id' => $request->like()->id];
        $input += ['likes_id' => Auth::id()];
        $post->fill($input)->save();
        return redirect('/');
    }
}
