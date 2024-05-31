<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #34495e;
            text-align: center;
            font-size: 45px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .title {
            color: #3498db;
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: bold;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .content {
            margin-top: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .content__post {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #3498db;
            font-size: 1.8em;
            margin-bottom: 10px;
            font-weight: bold;
        }

        p, ul {
            margin-left: 20px;
            line-height: 1.6;
        }

        ul {
            list-style: disc;
        }

        .edit, .footer {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        strong {
            font-weight: bold;
        }

        .header-container {
            background-color: #3498db; /* Add your desired color */
            padding: 20px;
            margin-bottom: 40px;
        }

        .header-container h2 {
            color: #fff; /* Set text color to white for contrast */
            margin: 0;
        }
    </style>
</head>
<body>

    <x-app-layout>
        <div class="header-container">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('お薬管理') }}
                </h2>
            </x-slot>
        </div>
        <h1>お薬詳細</h1>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>お薬の特徴</h3>
                <p><strong>{{ $post->feature }}</strong></p>

                <div class="category">
                    <h3>お薬の種類</h3>
                    <a href="/categories/{{ $post->category->id }}"><strong>{{ $post->category->name }}</strong></a>
                </div>

                <div class="usages">
                    <h3>用法</h3>
                    <ul>
                        @foreach($post->usages as $usage)
                            <li><strong>{{ $usage->usage }}</strong></li>
                        @endforeach
                    </ul>
                </div>

                <div class="efficacy">
                    <h3>効能効果</h3>
                    <p><strong>{{ $post->efficacy }}</strong></p>
                </div>

                <div class="attention">
                    <h3>注意事項・副作用</h3>
                    <p><strong>{{ $post->attention }}</strong></p>
                </div>

                <div class="remark">
                    <h3>備考欄</h3>
                    <p><strong>{{ $post->remark }}</strong></p>
                </div>
            </div>
        </div>

        @if($post->image)
        <div class="content">
            <img src="{{ $post->image }}" alt="画像が読み込めません。">
        </div>
        @endif

        <div class="edit">
            <button onclick="window.location.href='/posts/{{ $post->id }}/edit'">編集する</button>
        </div>

        <div class="footer">
            <button onclick="window.location.href='/index'">お薬一覧へ</button>
        </div>
    </x-app-layout>
</body>
</html>