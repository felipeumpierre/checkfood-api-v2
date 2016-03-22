<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api', 'middleware' => ['api']], function () {
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', 'MenuController@list')->name('_get_menu');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('_get_categories');
        Route::get('/{id}', 'CategoryController@show')->name('_get_category');
    });

    Route::group(['prefix' => 'opinion'], function () {
        Route::get('/', 'OpinionController@index')->name('_get_opinions');
        Route::post('/', 'OpinionController@create')->name('_post_opinion');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('_get_products');
        Route::get('/{id}', 'ProductController@show')->name('_get_product');
    });

    Route::group(['prefix' => 'board'], function () {
        Route::get('/{id}/open', 'BoardController@open')->name('_open_board');
        Route::get('/{id}/close', 'BoardController@close')->name('_close_board');
    });

    Route::group(['prefix' => 'checkout'], function () {
        Route::get('/board/{id}', 'CheckoutController@board')->name('_get_checkout_board');
        Route::post('/board/{id}', 'CheckoutController@request')->name('_request_checkout_board');
        Route::put('/board/{id}', 'CheckoutController@update')->name('_update_checkout_board');
    });
});
