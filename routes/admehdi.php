<?php

use ADMehdi\Facades\ADMehdi;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use ADMehdi\Events\Routing;
use ADMehdi\Events\RoutingAdmin;
use ADMehdi\Events\RoutingAdminAfter;
use ADMehdi\Events\RoutingAfter;

/*
|--------------------------------------------------------------------------
| ADMehdi Routes
|-----------------------------------------RoutingAdminAfter---------------------------------
|
| This file is where you may override any of the routes that are included
| with ADMehdi.
|
*/

Route::group(['as' => 'admehdi.'], function () {
//    event(new Routing());
//
//    $namespacePrefix = '\\' . config('admehdi.controllers.namespace') . '\\';
//
//    Route::get('login', ['uses' => $namespacePrefix . 'ADMehdiAuthController@login', 'as' => 'login']);
//    Route::post('login', ['uses' => $namespacePrefix . 'ADMehdiAuthController@postLogin', 'as' => 'postlogin']);
//
//    Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
//        event(new RoutingAdmin());
//
//        // Main Admin and Logout Route
//        Route::get('/', ['uses' => $namespacePrefix . 'ADMehdiController@index', 'as' => 'dashboard']);
//        Route::post('logout', ['uses' => $namespacePrefix . 'ADMehdiController@logout', 'as' => 'logout']);
//
//        Route::get('profile', ['uses' => $namespacePrefix . 'ADMehdiUserController@profile', 'as' => 'profile']);
//
//        try {
//            foreach (ADMehdi::model('DataType')->all() as $dataType) {
//                $breadController = $dataType->controller
//                    ? Str::start($dataType->controller, '\\')
//                    : $namespacePrefix . 'ADMehdiBaseController';
//
//                Route::get($dataType->slug . '/order', $breadController . '@order')->name($dataType->slug . '.order');
//                Route::post($dataType->slug . '/order', $breadController . '@update_order')->name($dataType->slug . '.update_order');
//                Route::get($dataType->slug . '/{id}/restore', $breadController . '@restore')->name($dataType->slug . '.restore');
//                Route::get($dataType->slug . '/relation', $breadController . '@relation')->name($dataType->slug . '.relation');
//                Route::resource($dataType->slug, $breadController, ['parameters' => [$dataType->slug => 'id']]);
//            }
//        } catch (\InvalidArgumentException $e) {
//            throw new \InvalidArgumentException("Custom routes hasn't been configured because: " . $e->getMessage(), 1);
//        } catch (\Exception $e) {
//            // do nothing, might just be because table not yet migrated.
//        }
//
//        // Settings
//        Route::group([
//            'as' => 'settings.',
//            'prefix' => 'settings',
//        ], function () use ($namespacePrefix) {
//            Route::get('/', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@index', 'as' => 'index']);
//            Route::post('/', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@store', 'as' => 'store']);
//            Route::put('/', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@update', 'as' => 'update']);
//            Route::delete('{id}', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@delete', 'as' => 'delete']);
//            Route::get('{id}/move_up', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@move_up', 'as' => 'move_up']);
//            Route::get('{id}/move_down', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@move_down', 'as' => 'move_down']);
//            Route::put('{id}/delete_value', ['uses' => $namespacePrefix . 'ADMehdiSettingsController@delete_value', 'as' => 'delete_value']);
//        });
//
//        // BREAD Routes
//        Route::group([
//            'as' => 'bread.',
//            'prefix' => 'bread',
//        ], function () use ($namespacePrefix) {
//            Route::get('/', ['uses' => $namespacePrefix . 'ADMehdiBreadController@index', 'as' => 'index']);
//            Route::get('{table}/create', ['uses' => $namespacePrefix . 'ADMehdiBreadController@create', 'as' => 'create']);
//            Route::post('/', ['uses' => $namespacePrefix . 'ADMehdiBreadController@store', 'as' => 'store']);
//            Route::get('{table}/edit', ['uses' => $namespacePrefix . 'ADMehdiBreadController@edit', 'as' => 'edit']);
//            Route::put('{id}', ['uses' => $namespacePrefix . 'ADMehdiBreadController@update', 'as' => 'update']);
//            Route::delete('{id}', ['uses' => $namespacePrefix . 'ADMehdiBreadController@destroy', 'as' => 'delete']);
//            Route::post('relationship', ['uses' => $namespacePrefix . 'ADMehdiBreadController@addRelationship', 'as' => 'relationship']);
//            Route::get('delete_relationship/{id}', ['uses' => $namespacePrefix . 'ADMehdiBreadController@deleteRelationship', 'as' => 'delete_relationship']);
//        });
//
//        // Database Routes
//        Route::resource('database', $namespacePrefix . 'ADMehdiDatabaseController');
//
//        event(new RoutingAdminAfter());
//    });
//
//    event(new RoutingAfter());
});
