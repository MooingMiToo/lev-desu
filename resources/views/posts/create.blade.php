<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お薬管理</title>
    </head>
    <body>
        <h1>お薬管理</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>お薬名</h2>
                <input type="text" name="post[title]" placeholder="お薬名" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>お薬詳細</h2>
                <textarea name="post[body]" placeholder="文字を入力してください">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>
</html>