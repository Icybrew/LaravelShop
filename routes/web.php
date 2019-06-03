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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/* Language */
Route::post('/home', 'LanguageController@change')->name('language.change');

/* Category */
Route::get('/catalog', 'CategoriesController@index')->name('categories.index');
Route::get('/catalog/{id}', 'CategoriesController@show')->name('categories.show');

/* Product */
Route::get('/product', 'ProductsController@index')->name('product.index');
Route::get('/product/{id}', 'ProductsController@show')->name('product.show');

/* CART */
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart', 'CartController@destroy')->name('cart.destroy');

/* PROFILE */
Route::get('/profile', 'UserController@index')->middleware('auth')->name('profile.index');
Route::get('/profile/{id}', 'UserController@show')->name('profile.show');
Route::get('/profile/edit', 'UserController@edit')->middleware('auth')->name('profile.edit');
Route::patch('/profile', 'UserController@update')->middleware('auth')->name('profile.update');

/* FORUM */
Route::get('/forum', 'forum\ForumController@index')->name('forum.index');
Route::get('/forum/{id}', 'forum\ForumController@show')->name('forum.show');

Route::resource('forum/thread', 'forum\ThreadController', [
    'as' => 'forum'
])->except([
    'create', 'store', 'index'
]);

Route::get('/forum/{id}/thread', 'forum\ThreadController@create')->name('forum.thread.create')->middleware('auth');
Route::post('/forum/{id}/thread', 'forum\ThreadController@store')->name('forum.thread.store')->middleware('auth');


/* ABOUT */
Route::get('/about', 'AboutController@index')->name('about.index');


/* ADMIN */
Route::get('/admin', 'Admin\AdminController@index')->middleware('admin')->name('admin');

Route::resource('admin/categories', 'Admin\CategoriesController', [
    'as' => 'admin'
])->middleware('admin');

Route::resource('admin/products', 'Admin\ProductsController', [
    'as' => 'admin'
])->middleware('admin');

Route::resource('admin/users', 'Admin\UsersController', [
    'as' => 'admin'
])->middleware('admin');