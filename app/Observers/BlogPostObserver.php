<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the blog post "creating" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function creating(BlogPost $blogPost)
    {
        //dd($blogPost);
        $this->setUser($blogPost);
        $this->setHtml($blogPost);
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Handle the blog post "updating" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
       // var_dump(2, 'updating');
        $this->setHtml($blogPost);
        $this->setPublishedAt($blogPost); // в реальном проекте обычно так не происходит
        $this->setSlug($blogPost);
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Если дата публикации не установлена и происхдит установка флага - опубликовано
     * то устанавливаем дату публикаии на текущую
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if($blogPost->is_published && empty($blogPost->published_at))
            $blogPost->published_at=Carbon::now(3);
    }

    /**
     * Если идентификатор не установлен
     * то делает стрслаг из названия поста
     * @param BlogPost $blogPost
     *
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if(empty($blogPost->slug))
            $blogPost->slug=Str::slug($blogPost->title);
    }

    /**
     * Создание html-контента из сырых данных
     * @param BlogPost $blogPost
     *
     */
    protected function setHtml(BlogPost $blogPost)
    {
        if($blogPost->isDirty('content_raw')) {// если данные изменялись
            // сдесь должна быть генерация markdown -> HTML
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * Установка хозяина статьи
     * @param BlogPost $blogPost
     *
     */
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }


}
