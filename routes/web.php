<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@root')->name('root');

//laravel的用户认证路由（登录，注册，密码重置），php artisan make:auth自动生成
Auth::routes();
//等同于如下路由集合
// Authentication Routes...
/*Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/


//网站主页，由于自定义设置了主页，不需要默认生成的，删除此条路由
//Route::get('/home', 'HomeController@index')->name('home');
//给user注册一个资源路由
Route::resource('users','UsersController',['only'=>['show','update','edit']]);

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
//分类路由
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
//上传图片路由
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');