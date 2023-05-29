<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/post/{id}', 'PostController@getpost')->name('posts.getpost');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
        
    });

    Route::group(['middleware' => ['auth']], function() {

        Route::post('/posts', 'PostController@store')->name('posts');
        Route::delete('/post/{id}', 'PostController@delete')->name('posts.delete');
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::post('/posts/{post}/like', 'PostController@like')->name('posts.like');
Route::delete('/posts/{post}/unlike', 'PostController@unlike')->name('posts.unlike');
    });
});


