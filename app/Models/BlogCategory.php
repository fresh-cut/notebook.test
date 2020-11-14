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

    protected static function booted() { // события  https://laravel.com/docs/8.x/eloquent#events
        static::updated(function($blogCategory){
            if(empty($blogCategory->slug)){
                $blogCategory->slug=Str::slug($blogCategory->title);
            }
        });
    }

    public function posts()
    {
        // у этой категории есть несколько статей
        // по умолчанию функция бы искала столбец blog_category_id,
        // но у нас он называется category_id, поэтому указываем его вторым параметром
        return $this->hasMany(BlogPost::class, 'category_id');
    }
}
