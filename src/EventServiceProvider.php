<?php

namespace ADMehdi;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use ADMehdi\Events;
use ADMehdi\Listeners;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Events\BreadAdded::class => [
            Listeners\AddBreadPermission::class,
        ],
        Events\SettingUpdated::class => [
            Listeners\ClearCachedSettingValue::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
