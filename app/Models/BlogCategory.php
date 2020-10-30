<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    //при массовом сохранении игнорировать эти поля https://laravel.com/docs/5.8/eloquent#mass-assignment
    protected $guarded = ['_method', '_token'];

    protected static function booted() {
        static::creating(function($blogCategory){
           if(empty($blogCategory->slug)){
               $blogCategory->slug=Str::slug($blogCategory->title);
           }
        });

        static::saving(function($blogCategory){
            if(empty($blogCategory->slug)){
                $blogCategory->slug=Str::slug($blogCategory->title);
            }
        });
}
}
