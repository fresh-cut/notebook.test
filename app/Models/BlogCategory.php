<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    //при массовом сохранении игнорировать эти поля https://laravel.com/docs/5.8/eloquent#mass-assignment
    protected $guarded = ['_method', '_token'];
}
