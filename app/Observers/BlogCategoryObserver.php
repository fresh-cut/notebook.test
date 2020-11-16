<?php

namespace App\Observers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the blog category "creating" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }


    /**
     * Handle the blog category "updating" event.
     *
     * @param  \App\Models\BlogCategory  $blogCaterory
     * @return void
     */
    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    /**
     * Handle the blog category "restored" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "force deleted" event.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Если идентификатор не установлен
     * то делает стрслаг из названия поста
     * @param BlogPost $blogPost
     *
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if(empty($blogCategory->slug))
            $blogCategory->slug=Str::slug($blogCategory->title);
    }
}
