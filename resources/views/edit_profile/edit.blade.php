@extends('layouts.app')

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SELF-SUFFICIENT BLOG</title>
    </head>
    <body>
        <!--<form action="/posts" method="POST">-->
        <!--    @csrf-->
        <!--    <div class="body">-->
        <!--        <textarea name="post[body]" placeholder="投稿する内容を入力"></textarea>-->
        <!--    </div>-->
        <!--    <div class="back">[<a href="/">back</a>]</div>-->
        <!--    <input type="submit" value="POST"/>-->
        <!--    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>-->
        <!--</form>-->
        
        <form action="/edit" method="POST">
            @csrf
            <div class="change_content">
                <div class="change_user_name">
                    <h2>ユーザー名</h2>
                    <textarea name="edit[user_name]">{{Auth::user()->name}}</textarea>
                </div>
                <div class="change_profile_image">
                    <h2>プロフィール画像</h2>
                </div>
                <div class="change_bio">
                    <h2>一言コメント</h2>
                    @if(isset($bio))
                        <textarea name="edit[bio]">{{Auth::user()->bio}}</textarea>
                    @else
                        <textarea name="edit[bio]" placeholder="一言コメントを入力"></textarea>
                    @endif
                </div>
            </div>
        </form>
    </body>
</html>
@endsection