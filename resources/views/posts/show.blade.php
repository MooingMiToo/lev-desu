<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>お薬詳細</h3>
                <p>{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            </div>
        </div>
        @if($post->image_url)
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
        @endif
        <div class="edit">
            <button onclick="window.location.href='/posts/{{ $post->id }}/edit'">編集する</button>
        </div>
        <div class="footer">
            <button onclick="window.location.href='/'">戻る</button>
        </div>
    </body>
</html>