<?php

namespace App\Providers;

use App\Http\Controllers\ImageController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SettingsSavedListener;
use App\Models\Page;
use App\Observers\PageObserver;
use Illuminate\Support\Facades\Log;

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
        Event::listen("cms-module.saved", function () {
            $latest = Page::orderBy('updated_at', 'DESC')->get()->first();
            $start = now()->addSeconds(5);
            $end = now()->addSeconds(-5);
            Log::debug(!!$latest->isDirty('title'));
            if ($latest->updated_at->between($start, $end)) {
                // ImageController::makeOpenGraph($latest);
            }
        });
        // Page::observe(PageObserver::class);
    }
}
