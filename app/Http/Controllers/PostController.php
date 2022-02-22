<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;

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
        return $post->get();
    }
}
