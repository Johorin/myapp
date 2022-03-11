@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SELF-SUFFICIENT BLOG</title>
    </head>
    <body>
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <textarea name="post[body]" placeholder="投稿する内容を入力"></textarea>
            </div>
            <div class="back">[<a href="/">back</a>]</div>
            <input type="submit" value="POST"/>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </form>
    </body>
</html>
@endsection