<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        
        // template
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ChannelRepository::class, \App\Repositories\ChannelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CountryRepository::class, \App\Repositories\CountryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FavouriteRepository::class, \App\Repositories\FavouriteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HistoryRepository::class, \App\Repositories\HistoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageRepository::class, \App\Repositories\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SettingRepository::class, \App\Repositories\SettingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagRepository::class, \App\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VideoRepository::class, \App\Repositories\VideoRepositoryEloquent::class);
//        $this->app->bind();
//        $this->app->bind();
//        $this->app->bind();
//        $this->app->bind();
//        $this->app->bind();
//        $this->app->bind();
//        $this->app->bind();
//        $this->app->bind();
        
        // binding the YouTube API Class
        $this->app->singleton(\App\Helpers\YouTubeHelper::class,\App\Helpers\YouTubeHelper::class);
        $this->app->singleton(\App\Helpers\ChannelHelper::class, \App\Helpers\ChannelHelper::class);
        
    }
}
