<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usage;
use App\Models\Post;

class UsageController extends Controller
{
    public function index (Usage $usage)
    {
        $posts = $usage->posts()->orderBy('updated_at', 'DESC')->paginate(5);
        return view ('usages/index',compact('posts'));
    }
}
