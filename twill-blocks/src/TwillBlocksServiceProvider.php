<?php

namespace Placement\TwillBlocks;

use Placement\TwillBlocks\Commands\PublishBlocks;
use Illuminate\Support\ServiceProvider;

class TwillBlocksServiceProvider extends ServiceProvider
{

    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton('pl-twill-blocks:publish', function ($app) {
            return new PublishBlocks();
        });

        $this->commands([
            'pl-twill-blocks:publish'
        ]);
    }
}
