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

get('/', function () {
    return view('welcome');
});

get('/test', function()
{
//   return view('layout.master');
    return view('auth.create');
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
