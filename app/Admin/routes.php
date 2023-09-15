<?php

use App\Admin\Controllers\BannerController;
use App\Admin\Controllers\ProviderController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
   
    $router->resource('transactions', TransactionController::class);
    $router->resource('providers', ProviderController::class);
    $router->resource('banners', BannerController::class);

    $router->resource('users', UserController::class);
    $router->resource('banks', BankController::class);
    $router->resource('bank-users', BankUserController::class);
    $router->resource('number-transfers', NumberTransferController::class);

});
