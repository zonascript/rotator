<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','NewsController@index');

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/signIn','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('auth/registration','Auth\AuthController@getRegister');
Route::post('auth/create','Auth\AuthController@postRegister');

Route::get('dashboard','Dashboard\DashboardController@index');
Route::get('dashboard/referral','Dashboard\DashboardController@referral');
Route::post('dashboard/new-address','Dashboard\DashboardController@postAddress');

Route::post('set-wallet','WalletController@set');
Route::get('unset-wallet/{faucet}','WalletController@destroy');
Route::get('refer/{address}','WalletController@setRefer');

Route::get('faq','FaqController@getFaq');

Route::get('admin','Admin\LoginController@index');
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/auth','Admin\LoginController@auth');
Route::get('admin/logout','Admin\LoginController@logout');

Route::get('admin/order','Admin\OrderController@index');
Route::get('admin/order/destroy/{id}','Admin\OrderController@destroy');

// news
Route::get('admin/news','Admin\NewsController@index');
Route::get('admin/news/edit/{id}','Admin\NewsController@edit');
Route::patch('admin/news/update/{id}','Admin\NewsController@update');
Route::get('admin/news/destroy/{id}','Admin\NewsController@destroy');
Route::get('admin/news/create','Admin\NewsController@create');
Route::post('admin/news/store','Admin\NewsController@store');

// faq
Route::get('admin/faq','Admin\FaqController@index');
Route::get('admin/faq/edit/{id}','Admin\FaqController@edit');
Route::patch('admin/faq/update/{id}','Admin\FaqController@update');
Route::get('admin/faq/destroy/{id}','Admin\FaqController@destroy');
Route::get('admin/faq/create','Admin\FaqController@create');
Route::post('admin/faq/store','Admin\FaqController@store');

// coins
Route::get('admin/coins','Admin\CoinsController@getCoins');
Route::post('admin/coins/set-address','Admin\CoinsController@setAddress');

Route::get('admin/{faucet}','Admin\FaucetController@index');
Route::get('admin/{faucet}/create','Admin\FaucetController@create');
Route::post('admin/{faucet}/store','Admin\FaucetController@store');
Route::get('admin/{faucet}/destroy/{id}','Admin\FaucetController@destroy');
Route::get('admin/{faucet}/edit/{id}','Admin\FaucetController@edit');
Route::patch('admin/{faucet}/update/{id}','Admin\FaucetController@update');
Route::get('admin/{faucet}/no-published','Admin\FaucetController@noPublished');
Route::get('admin/{faucet}/no-browser','Admin\FaucetController@noBrowser');
Route::get('admin/{faucet}/no-paid','Admin\FaucetController@noPaid');
Route::get('admin/{faucet}/browser/{id}','Admin\FaucetController@getBrowser');


Route::get('unset-timer/{faucet}/{faucetId}','FaucetController@unsetOneTimer');
Route::get('filter/change/{order}','FaucetController@changeOrderBy');

Route::post('vote','VoteController@setVote');

Route::post('bankrupt','BankruptController@setBankrupt');

// Favorite
Route::get('favorite/follow/{faucetName}/{faucet}','FavoriteController@follow');
Route::get('favorite/unfollow/{faucetName}/{faucet}','FavoriteController@unFollow');

Route::get('order/add','OrderController@add');
Route::post('order/set','OrderController@set');

Route::post('{faucet}/filter','FaucetController@filter');
Route::get('{faucet}/show/{id}','FaucetController@show');

Route::post('next','FaucetController@next');

// faucet list
Route::get('my/{faucet}','FaucetController@myList');
Route::get('{faucet}','FaucetController@index');
Route::get('{faucet}/{script}/{captcha}/{period}/{antibot}/{wait}','FaucetController@index');

// browser
Route::get('my/browser/{faucet}','FaucetController@myBrowser');
Route::get('browser/{faucet}','FaucetController@browser');
Route::get('browser/{faucet}/{script}/{captcha}/{period}/{antibot}/{wait}','FaucetController@browser');
Route::get('browser/{faucet}/{script}/{captcha}/{period}/{antibot}/{wait}/{siteId}','FaucetController@browser');

