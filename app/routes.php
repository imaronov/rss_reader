<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@ShowWelcome');

Route::Post('/', 'AccountController@login');

Route::get('/register.php', function() {
    return View::make('register');
});

Route::post('/register.php', 'HomeController@register');

Route::get('/account', 'AccountController@home');

Route::get('/feed/add.php', 'RssController@addNew');

Route::get('/account/logout.php', 'AccountController@logout');