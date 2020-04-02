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
        $this->setPublishrdAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Если дата публикации пустая  то назначаем
     */
    public function setPublishrdAt($blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->is_published = Carbon::now();
        }
    }

    /**
     * Если слаг пустой то генерием из тайтла
     */
    public function setSlug($blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }


    /**
     * Handle the blog post "deleted" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
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
