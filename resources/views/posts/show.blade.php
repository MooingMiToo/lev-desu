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
            </div>
        </div>
        <div class="edit">
            <button onclick="window.location.href='/posts/{{ $post->id }}/edit'">編集する</button>
        </div>
        <div class="footer">
            <button onclick="window.location.href='/'">戻る</button>
        </div>
    </body>
</html>