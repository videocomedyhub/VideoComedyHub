<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\VideoWidgetComposer;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        View::composer(
                'layouts.app', \App\Http\ViewComposers\SettingComposer::class
        );
        View::composer(
                [
            'frontend.videos.*',
            'frontend.channels.*', 'frontend.categories.*',
            'frontend.index.search', 'frontend.tags.*'
                ], VideoWidgetComposer::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
      //  $this->app->singleton(\App\Http\ViewComposers\SettingComposer::class);
    }

}
