<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usage extends Model
{
    use HasFactory;

    
    
    public function getByUsage(int $limit_count =5)
    {
        return $this->usages()->with('posts')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function usages()
    {
        return $this->belongsToMany(Usage::class);
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_usage', 'usage_id', 'post_id');
    }
}
