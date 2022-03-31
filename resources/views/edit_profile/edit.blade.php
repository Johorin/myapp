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
        <link href="{{asset('/css/edit.css')}}" rel="stylesheet">
    </head>
    <body>
        <form action="/editsave" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="timeline">
                <div class="timeline__change_content">
                    <div class="change_user_name">
                        <h2>ユーザー名</h2>
                        <textarea name="user_name">{{Auth::user()->name}}</textarea>
                    </div>
                    <div class="change_profile_image">
                        <h2>プロフィール画像</h2>
                        <div class="form-group">
                            <!--<img src="{{ asset('storage/3hkPBc3S7F3oylGmAgo4GxNGQObWTSZHWmyq5JMV.jpg') }}">-->
                            @foreach ($profile as $data)
                            <div class="form-group__image">
                                <img src="{{ $data->icon_image }}">
                            </div>
                            @endforeach
                            <div class="form-group__file">
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>
                    </div>
                    <div class="change_bio">
                        <h2>一言コメント</h2>
                        @if(isset($bio))
                            @foreach ($bio as $data)
                            <textarea name="bio">{{$data->bio}}</textarea>
                            @endforeach
                        @else
                            <textarea name="bio" placeholder="一言コメントを入力"></textarea>
                        @endif
                    </div>
                </div>
                <div class="timeline__botton">
                    <div class="botton__back">
                        <a href="/">⬅︎ BACK</a>
                    </div>
                    <div class="botton__save">
                        <input type="submit" value="SAVE"/>
                        <p class="profile_image__error" style="color:red">{{ $errors->first('image') }}</p>
                        <p class="bio__error" style="color:red">{{ $errors->first('edit.bio') }}</p>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
@endsection