<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SettingsSavedListener;
use App\Models\Page;
use App\Observers\PageObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // 'cms-settings.saved' => [SettingsSavedListener::class],
    ];

    /**
     * Register any events for your application.
     *
     * php artisan make:observer PageObserver --model=Page
     * @return void
     */
    public function boot()
    {
        Page::observe(PageObserver::class);
    }
}
