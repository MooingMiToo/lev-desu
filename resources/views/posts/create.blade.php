<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>お薬管理</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            color: #333;
            font-weight: bold; /* Set all text to bold */
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            font-weight: bold;
            font-size: 45px;
            text-transform: uppercase;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        form div {
            margin-bottom: 15px;
        }
        h2 {
            color: #2c3e50;
            font-size: 1.2em;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            outline: none;
            transition: border-color 0.3s;
            font-weight: bold;
        }
        input[type="text"]:focus, textarea:focus, select:focus {
            border-color: #3498db;
        }
        input[type="file"] {
            padding: 10px 0;
            font-weight: bold;
        }
        .submit-container {
            text-align: center; /* Center the submit button */
        }
        input[type="submit"], .back button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: bold;
        }
        input[type="submit"]:hover, .back button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        .title__error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            font-weight: bold;
        }
        .back {
            text-align: center;
            margin-top: 20px;
        }
        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
        button:hover {
            background-color: #2980b9;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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
<x-app-layout>
    <div class="header-container">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('お薬管理') }}
            </h2>
        </x-slot>
    </div>
    <body>
        <h1>新規作成</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <h2>お薬名</h2>
                <input type="text" name="post[title]" placeholder="お薬名を入力してください" value="{{ old('post.title') }}"/>
                <p class="title__error">{{ $errors->first('post.title') }}</p>

                <h2>お薬の特徴</h2>
                <textarea name="post[feature]" placeholder="お薬の特徴を入力してください（例：白色など）">{{ old('post.feature') }}</textarea>

                <div class="category">
                    <h2>お薬の種類</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <h2>用法</h2>
                @foreach($usages as $usage)
                    <label>
                        <input type="checkbox" value="{{ $usage->id }}" name="usages_array[]">
                        {{$usage->usage}}
                    </label>
                @endforeach
                <h2>効能効果</h2>
                <textarea name="post[efficacy]" placeholder="効能効果を入力してください">{{ old('post.efficacy') }}</textarea>

                <h2>注意事項・副作用</h2>
                <textarea name="post[attention]" placeholder="注意事項や副作用を入力してください">{{ old('post.attention') }}</textarea>

                <h2>備考欄</h2>
                <textarea name="post[remark]" placeholder="飲み合わせや薬の期限などを入力してください">{{ old('post.remark') }}</textarea>
            </div>
            <div class="image">
                <h2>画像</h2>
                <input type="file" name="image">
            </div>
            <div class="submit-container"> <!-- Center the submit button -->
                <input type="submit" value="保存"/>
            </div>
        </form>
        <div class="back">
            <button onclick="window.location.href='/'">お薬一覧へ</button>
        </div>
    </body>
</x-app-layout>
</html>