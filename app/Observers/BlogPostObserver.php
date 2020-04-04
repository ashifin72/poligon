<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the blog post "created" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {

    }

    /**
     * @param BlogPost $blogPost
     * обработка перед созданием записи
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }



    /**
     * Handle the blog post "updated" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);

    }

    /**
     * @param BlogPost $blogPost
     * если нет то утсанавливаем дату публикации
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published){
            $blogPost->is_published = Carbon::now();
        }
    }

    /**
     * @param $blogPost
     * Если слаг пустой то генерием из тайтла
     */
    protected function setSlug($blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    /**
     * @param BlogPost $blogPost
     * Установка для поля conten_html  относительно поля content_raw
     */

    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * @param BlogPost $blogPost
     *
     */
    protected function setUser(BlogPost $blogPost)
    {
     $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * @param BlogPost $blogPost
     */
     public function deleting(BlogPost $blogPost)
     {
//         return false;
     }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
//        dd(__METHOD__, $blogPost);
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
