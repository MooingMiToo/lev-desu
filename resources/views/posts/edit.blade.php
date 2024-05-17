<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お薬管理</title>
    </head>
    <body>
    <h1 class="title">編集</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>お薬名</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>お薬の特徴</h2>
                <input type='text' name='post[feature]' value="{{ $post->feature }}">
                <h2>効能効果</h2>
                <input type='text' name='post[efficacy]' value="{{ $post->efficacy }}">
                <h2>注意事項・副作用</h2>
                <input type='text' name='post[attention]' value="{{ $post->attention }}">
                <h2>備考欄</h2>
                <input type='text' name='post[remark]' value="{{ $post->remark }}">
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    <div class="back"><button onclick="window.location.href='/posts'">戻る</button></div>
</body>
</html>