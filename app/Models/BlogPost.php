<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['_method', '_token'];

    protected static function booted()
    {
        static::saving(function($blogPost){
            if($blogPost->is_published && empty($blogPost->published_at))
                $blogPost->published_at=now();
            if(empty($blogPost->slug))
                $blogPost->slug=Str::slug($blogPost->title);
        });
    }

    public function category()
    {
        // этот обьект принадлежит блогкатегории
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        // эта статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
