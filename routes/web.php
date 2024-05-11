<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class ,'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class,'delete']);
Route::get('/categories/{category}', [CategoryController::class,'index']);
Route::get('/posts/create', [PostController::class, 'create']);  //投稿フォームの表示
Route::post('/posts', [PostController::class, 'store']);  //画像を含めた投稿の保存処理
Route::get('/posts/{post}', [PostController::class, 'show']); //投稿詳細画面の表示