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

    Route::group(['namespace' => 'Admin', 'prefix' => $prefix, 'middleware' => 'auth'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');

        Route::group(['prefix' => 'blog'], function () {

            Route::group(['prefix' => 'posts'], function () {
                Route::get('/', 'PostsController@index')->name('posts');
                Route::get('form/{id?}', 'PostsController@form')->name('posts.form')->where('id', '[0-9]+');
                Route::post('save', 'PostsController@save')->name('posts.save');
                Route::get('destroy/{id?}', 'PostsController@destroy')->name('posts.destroy');
                Route::post('items/destroy/{id?}', 'PostsController@itemsDestroy')->name('posts.items-destroy');
            });

            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', 'CategoryController@index')->name('category');
                Route::get('form/{id?}', 'CategoryController@form')->name('category.form')->where('id', '[0-9]+');
                Route::post('save', 'CategoryController@save')->name('category.save');
                Route::get('destroy/{id?}', 'CategoryController@destroy')->name('category.destroy');
                Route::post('items/destroy/{id?}', 'CategoryController@itemsDestroy')->name('category.items-destroy');
            });
        });



    });
