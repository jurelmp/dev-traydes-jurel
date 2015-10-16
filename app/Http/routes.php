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
    return redirect('home');
});

Route::get('/login', function() {
    return redirect('auth/login');
});

Route::get('/register', function() {
    return redirect('auth/register');
});

//Route::get('/test', function() {
//    $cat = Traydes\Category::find(0);
//    $categories = $cat->subCategories()->get();
//    return view('user.index')
//        ->with('cat', $categories);
//});

/**
 * resource controller for user category/post
 */
Route::resource('/categories', 'User\CategoryController');
Route::resource('/categories.posts', 'User\PostController');

/**
 * logging in and out
 * password reset/reminders
 */
Route::controller('/auth', 'Auth\AuthController');
Route::controller('/password', 'Auth\PasswordController');

Route::group(['middleware' => 'auth'], function() {
    /**
     * user route
     */
    Route::controller('/user', 'User\UserController');

    /**
     * home route
     */
    Route::get('/home', function () {
        return view('welcome');
    });
});

/*
Route::group(array('domain' => '{subdomain}.'), function()
{
    get('/', function($subdomain)
    {
       dd($subdomain);
    });
});
*/