@extends('layouts.app')

@section('content')
<div class='timeline'>
    @foreach ($posts as $post)
    <div class='timeline__post'>
        <div class="image_and_userName">
            <div class="timeline__post--profileImage">
                <img src="{{ asset('storage/3hkPBc3S7F3oylGmAgo4GxNGQObWTSZHWmyq5JMV.jpg') }}">
            </div>
            <div class="timeline__post--user_name">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>
        <p class='body'>{{ $post->body }}</p>
        <div class="timeline__post--good">
            <p class="heart"><i class="fa-solid fa-heart"></i></p>
            <p>{{ $post->num_likes }}</p>
        </div>
    </div>
    @endforeach
</div>
    <a class="createPost" href="/posts/create">
        <div class="circle">
            <i class="fa-solid fa-plus fa-7x"></i>
        </div>
    </a>
<!-- 特に次のクラスをCSSでレスポンシブ化 -->
<div class="naviMenu">
    <div class="naviMenu__home">
        <a href="/"><i class="fa-solid fa-house fa-5x"></i></a>
    </div>
    <div class="naviMenu__search">
        <a href="/search"><i class="fa-solid fa-magnifying-glass fa-5x"></i></a>
    </div>
    <div class="naviMenu__profile">
        <a href="/edit"><i class="fa-solid fa-user fa-5x"></i></a>
    </div>
</div>
@endsection