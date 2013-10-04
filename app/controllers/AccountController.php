<?php

class AccountController extends BaseController {

    public function login() {

        $email = Input::get('email');
        $password = Input::get('password');

        // encrypt password
        $password = md5($password);

        $user = User::where('email', '=', $email)->where('password', '=', $password)->get();

        if(sizeof($user) > 0) {
            // login successful
            $user = $user[0];
            Session::put('user', $user);

            // pass user data to the account view
            return View::make('/account/index')
                    ->with(array(
                        'first_name' => Session::get('user')->first_name,
                        'last_name' => Session::get('user')->last_name
                ));
        } else {
            // login not successful
            return View::make('index');
        }
    }

    public function logout() {
        Session::flush();
        return Redirect::to('/');
    }

    public function home() {
//        // check if user logged in
//        if(Session::get('user')) {
//            return View::make('/account/index')
//                ->with(array(
//                    'first_name' => Session::get('user')->first_name,
//                    'last_name' => Session::get('user')->last_name,
//                ));
//        } else {
//            return View::make('index');
//        }

        if(Session::get('user')) {
            return View::make('account/index')
                    ->with(array(
                    'first_name' => Session::get('user')->first_name,
                    'last_name' => Session::get('user')->last_name,
                ));
        }
        else {
            return View::make('index');
        }
    }

}