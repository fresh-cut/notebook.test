<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['_method', '_token', 'created_at', 'updated_at', 'published_at'];
    const UNKNOWN_USER=1;

//    protected static function booted()
//    {
//    }

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
