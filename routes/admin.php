
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    $prefix = config('temp.url.prefix_admin');

    Route::group(['namespace' => 'Admin', 'prefix' => $prefix, 'as' => 'admin.'], function () {

        Route::get('/', 'DashboardController@index')->name('dashboard.index');
        
        // ============================== CATEGORY ============================== //
        $prefix         = 'category';
        $controllerName = 'category';

        Route::group(['prefix' => $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName) . 'Controller@';

            Route::get('/', ['as' => $controllerName . '.index', 'uses' => $controller . 'index']);
            Route::get('form/{id?}', ['as' => $controllerName . '.form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
            Route::post('save', ['as' => $controllerName . '.save', 'uses' => $controller . 'save']);
            Route::get('delete/{id}', ['as' => $controllerName . '.delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');

        });

        // ============================== POSTS ============================== //

        $prefix         = 'posts';
        $controllerName = 'posts';

        Route::group(['prefix' => $prefix], function () use ($controllerName) {
            $controller = ucfirst($controllerName) . 'Controller@';

            Route::get('/', ['as' => $controllerName . '.index', 'uses' => $controller . 'index']);
            Route::get('form/{id?}', ['as' => $controllerName . '.form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
            Route::post('save', ['as' => $controllerName . '.save', 'uses' => $controller . 'save']);
            Route::get('delete/{id}', ['as' => $controllerName . '.delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');

        });


    });
