<!DOCTYPE html>
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
            font-weight: bold;
            color: #2c3e50;
        }
        h1, h2 {
            font-weight: bold;
        }
        h1 {
            color: #34495e;
            text-align: center;
            padding-left: 20px; /* 左にスペースを追加 */
            font-size: 45px; /* フォントサイズを大きく */
            text-transform: uppercase; /* 大文字に変換 */
            border-bottom: 2px solid #3498db; /* 下線を追加 */
            padding-bottom: 10px; /* 下線とテキストの間にスペースを追加 */
            margin-bottom: 30px; /* 下の要素との間にスペースを追加 */
        }
        button, select, .paginate a {
            font-family: 'Nunito', sans-serif;
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        button:hover, .paginate a:hover {
            background-color: #2980b9;
        }
        .posts {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .post {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: calc(33% - 40px);
            box-sizing: border-box;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column; /* ボックス内の要素を縦方向に配置 */
            justify-content: space-between; /* 上下にスペースを配置 */
        }
        .post:hover {
            transform: translateY(-5px);
        }
        .post h2 a {
            text-decoration: none;
            color: #2c3e50;
            transition: color 0.3s ease;
        }
        .post h2 a:hover {
            color: #3498db;
        }
        .post a {
            color: #3498db;
            text-decoration: none;
        }
        .post a:hover {
            text-decoration: underline;
        }
        .feature, .usage {
            color: #222;
        }
        .usage {
            text-align: left; /* 左揃え */
        }
        .paginate {
            text-align: center;
            margin: 20px 0;
        }
        .header-container {
            background-color: #3498db; /* Add your desired color */
            padding: 20px; /* Optional: Add padding for better appearance */
            margin-bottom: 20px; /* Optional: Adjust margin for spacing */
        }
        .header-container h2 {
            color: #fff; /* Set text color to white for contrast */
            margin: 0; /* Reset margin for h2 within the header */
        }
        @media (max-width: 768px) {
            .post {
                width: calc(50% - 40px);
            }
        }
        @media (max-width: 480px) {
            .post {
                width: calc(100% - 40px);
            }
        }
        
    </style>
</head>
<x-app-layout>
    <div class="header-container" style="margin-bottom: 20px;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('お薬管理') }}
            </h2>  
        </x-slot>
    </div>
        
    <body>
        <h1>お薬一覧</h1> <!-- タイトルを追加 -->
        <div style="text-align: center; margin-bottom: 20px;">
            <div style="display: inline-block; margin-right: 30px;">
                <button onclick="window.location.href='/posts/create'">新規作成へ</button>
            </div>
            <div style="display: inline-block;">
                <form action="{{ route('posts.index') }}" method="GET" style="display: inline-block;">
                    <select name="category_id">
                        <option value="">すべてのカテゴリー</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">絞り込む</button>
                </form>
            </div>
        </div>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                       <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='feature'>{{ $post->feature }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        <h3 class='usage'>
                        @foreach($post->usages as $usage)   
                            {{ $usage->usage }}
                        @endforeach   
                        </h3>
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除する</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>
</html>