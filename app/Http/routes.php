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

get('/', function() {
    return redirect('home');
});

get('/home', function () {
    return view('welcome');
});

get('/test', function()
{
    return view('auth.create');
});

/**
 * logging in and out
 * password reset/reminders
 */
//get('/auth/login', 'Auth\AuthController@getLogin');
//post('/auth/login', 'Auth\AuthController@postLogin');
//get('/auth/logout', 'Auth\AuthController@getLogout');
Route::controller('/auth', 'Auth\AuthController');
Route::controller('/password', 'Auth\PasswordController');

/*
Route::group(array('domain' => '{subdomain}.'), function()
{
    get('/', function($subdomain)
    {
       dd($subdomain);
    });
});
*/
