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
                <h3>薬の特徴</h3>
                <p>{{ $post->feature }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                
                <h3>効能効果</h3>
                <p>{{ $post->efficacy }}</p>
               
                
                <h3>注意事項・副作用</h3>
                <p>{{ $post->attention }}</p>
                
                
                <h3>備考欄</h3>
                <p>{{ $post->remark }}</p>
                
            </div>
        </div>
        
        @if($post->image)
        <div>
            <img src="{{ $post->image }}" alt="画像が読み込めません。"/>
        </div>
        @endif
        <div class="edit">
            <button onclick="window.location.href='/posts/{{ $post->id }}/edit'">編集する</button>
        </div>
        <div class="footer">
            <button onclick="window.location.href='/posts'">戻る</button>
        </div>
    </body>
</html>