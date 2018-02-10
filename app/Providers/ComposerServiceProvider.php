<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'frontend.*', \App\Http\ViewComposers\SettingComposer::class
        );
        View::composer(
            'frontend.*', \App\Http\ViewComposers\VideoComposer::class
        );
        View::composer(
            ['frontend.video-item', 'frontend.video-watch', 'frontend.channel-item',
                'frontend.channel-list', 'frontend.category-item', 'frontend.category-list', 'frontend.search'], \App\Http\ViewComposers\VideoWidgetComposer::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
