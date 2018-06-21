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

Route::get('/', 'MicropostsController@index'); // add by Ryo Nakajima
// user registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
// for follow
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    //********************************* for favorite function *****************************//
    // Add by Ryo Nakajima 2018/06/20 @micropost task 2 //
    //Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('favorites', 'UsersController@favorites')->name('users.fav'); // <<= !!!! Add favorite view file !!!!!! Ryo Nakajima 2018/06/20
        Route::post('favorite', 'FavoriteController@store')->name('fav.fav');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('fav.unfav');
        //});
    //*************************************************************************************//

    });

    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});
