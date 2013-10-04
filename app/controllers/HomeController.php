<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
        // check if already logged in
        if(Session::get('user')) {
            return Redirect::to('/account');
        }
        else {
            return View::make('index');
        }
	}

    public function register() {
        // TODO: form validation

        // store into database
        $user = new User(array(
           'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'email' => Input::get('email'),
            'password' => md5(Input::get('password1')) //encrypt password
        ));
        $user->save();

        Session::put('user', $user);
        //redirect to another page
        return Redirect::to('/');
    }

}