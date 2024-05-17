<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お薬管理</title>
    </head>
    <body>
        <h1>お薬管理</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>お薬名</h2>
                <input type="text" name="post[title]" placeholder="お薬名" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>薬の特徴</h2>
                <textarea name="post[feature]" placeholder="お薬の特徴を入力してください（例：白色など）">{{ old('post.feature') }}</textarea>
                
                <h2>効能効果</h2>
                <textarea name="post[efficacy]" placeholder="効能効果を入力してください">{{ old('post.efficacy') }}</textarea>
            
                
                <h2>注意事項・副作用</h2>
                <textarea name="post[attention]" placeholder="注意事項や副作用を入力してください">{{ old('post.attention') }}</textarea>

                
                <h2>備考欄</h2>
                <textarea name="post[remark]" placeholder="飲み合わせや薬の期限などを入力してください">{{ old('post.remark') }}</textarea>

            </div>
            <div class="category">
                <h2>お薬の種類</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back"><button onclick="window.location.href='/posts'">戻る</button></div>
    </body>
</html>