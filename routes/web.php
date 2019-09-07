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

Route::get('/', 'HomeController@index')->name('index');
Route::get('search', 'HomeController@search')->name('search');

Auth::routes();

Route::resource('posts', 'PostsController');
Route::resource('posts/types', 'PostTypesController', ['except' => ['index']]);
Route::resource('posts.comments', 'PostCommentsController', ['only' => ['store', 'destroy']]);

// Route::prefix('users')->name('users.')->group(function () {
//     Route::get('avatar', 'UserController@showAvatar')->name('showAvatar');
//     Route::post('avatar', 'UserController@uploadAvatar')->name('uploadAvatar');
// });

Route::prefix('login/social')->name('social.')->group(function () {
    Route::get('{provider}/redirect', 'Auth\SocialController@getSocialRedirect')->name('redirect');
    Route::get('{provider}/callback', 'Auth\SocialController@getSocialCallback')->name('callback');
});
