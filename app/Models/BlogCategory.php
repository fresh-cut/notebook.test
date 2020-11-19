<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class BlogCategory
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string       $parentTitle
 */
class BlogCategory extends Model
{
    const ROOT=1;
    use HasFactory;
    use SoftDeletes;
    //при массовом сохранении игнорировать эти поля https://laravel.com/docs/5.8/eloquent#mass-assignment
    protected $guarded = ['_method', '_token'];

   // protected static function booted() { // события  https://laravel.com/docs/8.x/eloquent#events
   // }

    public function posts()
    {
        // у этой категории есть несколько статей
        // по умолчанию функция бы искала столбец blog_category_id,
        // но у нас он называется category_id, поэтому указываем его вторым параметром
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    // текущая запись принадлежит некой записи из этой же категории
    // связываться будет по текущему полю parent_id
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id','id');
            //->withDefault(['title'=>'??']);
    }


    /**
     * Пример аксесора.
     * обращаться по строке между словаи get atribute (parentTitle)
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()?'Корень':'???');
        // в реальном проекте лучше не вопросики, а нормально обработать что не так с категорией
        return $title;
    }

    /**
     * является ли текущий элемент корневым
     */
    public function isRoot()
    {
        return $this->id==BlogCategory::ROOT;
    }
}
