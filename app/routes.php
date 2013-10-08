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
/*
 * TODO: add filters to determine what pages the user needs to be logged in to view instead of through logic in Controllers
 *
 * TODO: figure out to catch pages that don't exist
 */
Route::get('/', 'HomeController@ShowWelcome');

Route::Post('/login.php', 'AccountController@login');

Route::get('/register.php', function() {
    return View::make('register');
});

Route::post('/register.php', 'HomeController@register');

Route::get('/account', 'AccountController@home');

Route::get('/feed/add.php', 'RssController@addNew');

Route::get('/account/logout.php', 'AccountController@logout');