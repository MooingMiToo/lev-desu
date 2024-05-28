<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use App\Models\Category;
use Cloudinary;
use App\Models\Usage;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    
    public function index(Post $post, Request $request)
    {
        $userId = Auth::id();
        $categories = Category::all();
        // return view('posts.index')->with([
        //     'posts' => $post->getPaginateByLimit(),
        //     'categories' => $categories,
        // ]);
        $category_id = $request->input('category_id');

        $query = Post::query();
         if(!empty($category_id)) { 
            $query->where('category_id',$category_id); 
        }

        $posts = $query->paginate(15);

        return view('posts.index', compact('posts', 'category_id','categories'));

    }

    public function show(Post $post)
    {
        $post_id=$post->id;
        $usages = $post->usages;
        return view('posts.show')->with(['post' => $post,'usages' => $usages]);
    }

     public function create(Category $category, Usage $usage)
    {
        return view('posts.create')->with([
            'categories' => $category->get(),
            'usages' => $usage->get()]);
        
    }

    public function store(Post $post, Request $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        
    
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image' => $image_url];
        }
        
        $post->fill($input)->save();
        $input_usages = $request->usages_array;
        $post->usages()->attach($input_usages); 
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Category $category, Usage $usage)
    {
        return view('posts.edit')->with([
            'post' => $post, 
            'categories' => $category->get(),
            'usages' => $usage->get(),
            ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];

        if ($request->file('image')) { // 画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_post += ['image' => $image_url];
        }
    
        $post->fill($input_post)->save();
    
        // 一度現在の使用方法をすべて解除する
        $post->usages()->detach();
    
        // 新しい使用方法を追加する
        $input_usages = $request->usages_array;
        $post->usages()->attach($input_usages);
    
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
   
}
?>
