<?php

namespace ADMehdi;

use ADMehdi\FormFields\After\DescriptionHandler;
use ADMehdi\Policies\SettingPolicy;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use ADMehdi\Models\Setting;
use ADMehdi\Facades\ADMehdi as ADMehdiFacade;
use Illuminate\Support\Str;
use ADMehdi\Events\FormFieldsRegistered;

class MainProvider extends ServiceProvider
{

    protected $policies = [
        Setting::class => SettingPolicy::class,
    ];

    public function boot()
    {

    }

    public function register()
    {
        $this->app->register(EventServiceProvider::class);

        $loader = AliasLoader::getInstance();
        $loader->alias('ADMehdi', ADMehdiFacade::class);

        $this->app->singleton('admehdi', function () {
            return new ADMehdi();
        });

        $this->app->singleton('ADMehdiGuard', function () {
            return config('auth.defaults.guard', 'web');
        });
        $this->publishes([__DIR__ . '/../migrations/' => database_path('migrations')], 'admehdi-migrations');

        $this->loadHelpers();

        $this->registerFormFields();

        $this->registerConfigs();
    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    protected function registerFormFields()
    {
        $formFields = [
//            'checkbox',
//            'multiple_checkbox',
//            'color',
//            'date',
//            'number',
//            'password',
//            'radio_btn',
//            'rich_text_box',
//            'code_editor',
//            'markdown_editor',
//            'select_dropdown',
//            'select_multiple',
//            'text',
//            'text_area',
//            'time',
//            'timestamp',
//            'hidden',
        ];

        foreach ($formFields as $formField) {
            $class = Str::studly("{$formField}_handler");

            ADMehdiFacade::addFormField("ADMehdi\\FormFields\\{$class}");
        }

        ADMehdiFacade::addAfterFormField(DescriptionHandler::class);

        event(new FormFieldsRegistered($formFields));
    }

    public function registerConfigs()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/admehdi.php',
            'admehdi'
        );
    }
}