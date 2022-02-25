<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use App\Http\Requests\PostRequest;

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
        $post->fill($input)->save();
        return redirect('/');
    }
}
