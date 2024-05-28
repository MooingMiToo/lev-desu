<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お薬管理</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-weight: 600;
            font-weight: bold;
            line-height: 1.6;
        }
        h1 {
            color: #34495e;
            font-weight: bold;
            text-align: center;
            padding-left: 20px; /* 左にスペースを追加 */
            font-size: 45px; /* フォントサイズを大きく */
            text-transform: uppercase; /* 大文字に変換 */
            border-bottom: 2px solid #3498db; /* 下線を追加 */
            padding-bottom: 10px; /* 下線とテキストの間にスペースを追加 */
            margin-bottom: 40px; /* 下の要素との間にスペースを追加 */
        }
        
        .title {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-container {
            display: flex;
            justify-content: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            line-height: 1.6;
            font-weight: 600;
            font-weight: bold;
            margin-top: 30px;
        }
        h2 {
            color: #333;
            font-size: 1.2em;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="file"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            outline: none;
        }
        input[type="submit"], .back button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            font-weight: bold;
        }
       
        input[type="submit"]:hover, .back button:hover {
            background-color: #2980b9;
        }
        .back {
            text-align: center;
            margin-top: 20px;
        }
        .header-container {
            background-color: #3498db; /* Add your desired color */
            padding: 20px;
            margin-bottom: 40px; /* Added margin-bottom for extra space below the header */
        }
        .header-container h2 {
            color: #fff; /* Set text color to white for contrast */
            margin: 0; /* Reset margin for h2 within the header */
        }
        
    </style>
</head>
<body>
    <x-app-layout>
        <div class="header-container" style="margin-bottom: 20px;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('お薬管理') }}
            </h2>  
        </x-slot>
        </div>
        <h1>編集する</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>お薬名</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>お薬の特徴</h2>
                    <input type='text' name='post[feature]' value="{{ $post->feature }}">
                    
                    <div class="category">
                        <h2>お薬の種類</h2>
                        <select name="post[category_id]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <h2>用法</h2>
                    @foreach($usages as $usage)
                        <label>
                            <input type="checkbox" value="{{ $usage->id }}" name="usages_array[]"
                                {{ in_array($usage->id, $post->usages->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{$usage->usage}}
                            </input>
                        </label>
                    @endforeach
                
                
                    <h2>効能効果</h2>
                    <input type='text' name='post[efficacy]' value="{{ $post->efficacy }}">
                    <h2>注意事項・副作用</h2>
                    <input type='text' name='post[attention]' value="{{ $post->attention }}">
                    <h2>備考欄</h2>
                    <input type='text' name='post[remark]' value="{{ $post->remark }}">
                </div>
                
                <div class="image">
                    <h2>画像</h2>
                    <input type="file" name="image">
                </div>
                <div class="form-container">
                <input type="submit" value="保存">
                </div>
            </form>
        </div>
        <div class="back">
            <button onclick="window.location.href='/'">お薬一覧へ</button>
        </div>
    </x-app-layout>
</body>
</html>