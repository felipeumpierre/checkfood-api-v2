<?php


$api = app('Dingo\Api\Routing\Router');
$api->version('v2', function ($api) {

    $api->get('/', function () {
        return 'Welcome to Checkfood API V2';
    });

    $api->group(['prefix' => 'category'], function ($api) {
        $api->get('/', [
            'as' => 'category.index',
            'uses' => 'App\Http\Controllers\CategoryController@index',
        ]);

        $api->get('/{id}', [
            'as' => 'category.show',
            'uses' => 'App\Http\Controllers\CategoryController@show',
        ]);
    });

    $api->group(['prefix' => 'opinion'], function ($api) {
        $api->get('/', [
            'as' => 'opinion.index',
            'uses' => 'App\Http\Controllers\OpinionController@index',
        ]);

        $api->post('/', [
            'as' => 'opinion.index',
            'uses' => 'App\Http\Controllers\OpinionController@create',
        ]);
    });

    $api->group(['prefix' => 'product'], function ($api) {
        $api->get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\ProductController@index',
        ]);

        $api->get('/{id}', [
            'as' => 'product.show',
            'uses' => 'App\Http\Controllers\ProductController@show',
        ]);

        $api->get('/{id}/ingredients', [
            'as' => 'product.ingredient',
            'uses' => 'App\Http\Controllers\ProductController@ingredients',
        ]);
    });

    $api->group(['prefix' => 'board'], function ($api) {
        $api->get('/{id}/open', [
            'as' => 'board.open',
            'uses' => 'App\Http\Controllers\BoardController@open',
        ]);

        $api->get('/{id}/close', [
            'as' => 'board.close',
            'uses' => 'App\Http\Controllers\BoardController@close',
        ]);
    });

    $api->group(['prefix' => 'menu'], function ($api) {
        $api->get('/', [
            'as' => 'menu.menu',
            'uses' => 'App\Http\Controllers\MenuController@menu',
        ]);

        $api->get('/grouped/{option}', [
            'as' => 'menu.grouped',
            'uses' => 'App\Http\Controllers\MenuController@grouped',
        ]);

        $api->get('/products/category/{category}', [
            'as' => 'menu.product',
            'uses' => 'App\Http\Controllers\MenuController@category',
        ]);
    });

    $api->group(['prefix' => 'checkout'], function ($api) {
        $api->get('/board/{id}', [
            'as' => 'checkout.board',
            'uses' => 'App\Http\Controllers\CheckoutController@board',
        ]);

        $api->post('/board/{id}', [
            'as' => 'checkout.board',
            'uses' => 'App\Http\Controllers\CheckoutController@request',
        ]);

        $api->put('/board/{id}', [
            'as' => 'checkout.board',
            'uses' => 'App\Http\Controllers\CheckoutController@update',
        ]);
    });

});

app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('category.index');
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('category.show', ['id']);

app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('opinion.index');
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('opinion.index');

app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('product.index');
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('product.show', ['id']);
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('product.ingredient', ['id']);

app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('board.open', ['id']);
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('board.close', ['id']);

app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('menu.menu');
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('menu.grouped', ['option']);
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('menu.product', ['category']);

app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('checkout.board', ['id']);
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('checkout.board', ['id']);
app('Dingo\Api\Routing\UrlGenerator')->version('v2')->route('checkout.board', ['id']);