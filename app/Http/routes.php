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

Route::get('/', function() {
    return redirect('t');
});

Route::get('login', function() {
    return redirect('auth/login');
});

Route::get('register', function() {
    return redirect('auth/register');
});

//Route::get('/test', function() {});

/**
 * resource controller for user category/post
 */
Route::resource('categories', 'User\CategoryController');
Route::resource('categories.posts', 'User\PostController');

/**
 * logging in and out
 * password reset/reminders
 */
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');

Route::controller('t', 'IndexController');

/**
 * protected routes
 */
Route::group(['middleware' => 'auth'], function() {
    /**
     * user route
     */
    Route::controller('user', 'User\UserController');

    /**
     * admin routes
     */
    Route::controller('admin', 'AdminController');

    /**
     * home route
     */
    Route::get('home', function () {
        return view('welcome');
    });
});


/**
 * sub domain routing for areas
 */
Route::group(array('domain' => '{subdomain}.traydes.local'), function()
{
    get('/test', function($subdomain)
    {
        return $subdomain;
    });
});

