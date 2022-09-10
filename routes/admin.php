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

    Route::group(['namespace' => 'Admin', 'prefix' => $prefix, 'middleware' => 'auth', 'as' => 'admin.'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('form/{id?}', 'CategoryController@form')->name('form')->where('id', '[0-9]+');
            Route::post('save', 'CategoryController@save')->name('save');
            Route::get('destroy/{id?}', 'CategoryController@destroy')->name('destroy');
            Route::post('items/destroy/{id?}', 'CategoryController@itemsDestroy')->name('items-destroy');
        });

        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('form/{id?}', 'CategoryController@form')->name('form')->where('id', '[0-9]+');
            Route::post('save', 'CategoryController@save')->name('save');
            Route::get('destroy/{id?}', 'CategoryController@destroy')->name('destroy');
            Route::post('items/destroy/{id?}', 'CategoryController@itemsDestroy')->name('items-destroy');
        });

        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::get('/', 'PostsController@index')->name('index');
            Route::get('form/{id?}', 'PostsController@form')->name('form')->where('id', '[0-9]+');
            Route::post('save', 'PostsController@save')->name('save');
            Route::get('destroy/{id?}', 'PostsController@destroy')->name('destroy');
            Route::post('items/destroy/{id?}', 'PostsController@itemsDestroy')->name('items-destroy');
        });

    });
