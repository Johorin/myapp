<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>SELF-SUFFICIENT BLOG</h1>
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