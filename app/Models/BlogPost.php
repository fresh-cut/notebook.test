<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['_method', '_token'];

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
