@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SELF-SUFFICIENT BLOG</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Reset CSS -->
        <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
        <!-- CSSの読み込み -->
        <link href="{{asset('/css/create.css')}}" rel="stylesheet">
    </head>
    <body>
        <form action="/posts" method="POST">
            @csrf
            <div class="post_example">
                <div class="post_example__profileImage_and_userName">
                    <div class="post_example__image_and_userName--profileImage">
                        <p>プロフィール画像</p>
                    </div>
                    <div class="post_example__image_and_userName--userName">
                        <p>{{Auth::user()->name}}</p>
                    </div>
                </div>
                <div class="post_example__body">
                    <textarea name="post[body]" placeholder="投稿する内容を入力"></textarea>
                </div>
            </div>
            <div class="botton">
                <div class="botton__back">
                    <a href="/">⬅︎ BACK</a>
                </div>
                <div class="botton__post">
                    <input type="submit" value="POST"/>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
            </div>
        </form>
    </body>
</html>
@endsection