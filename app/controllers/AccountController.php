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
            // set session
            Session::put('user', $user);
            // redirect to account
            return Redirect::to('/account');
        } else {
            // login not successful
            return View::make('index');
        }
    }

    public function logout() {
        // destroy session
        Session::flush();
        // redirect to home
        return Redirect::to('/');
    }

    public function home() {
        // checks if user is logged in
        if(Session::get('user')) {

            if (!is_numeric(Input::get('feed_id'))) {
                //return "no";
            }

            $items = array();

            // get all feeds
            $feeds = DB::table('feeds')
                ->join('feeds_users', 'feeds.id', '=', 'feeds_users.id')
                ->where('feeds_users.users_id', '=', Session::get('user')->id)
                ->get();

            // get all items
            for($i = 0; $i < sizeof($feeds); $i++) {
                $items[$i] = DB::table('items')
                    ->join('feeds', 'items.feeds_id', '=', 'feeds.id')
                    ->get();
            }

            // get counts
            // item count
            $count['items'] = DB::table('items')
                            ->join('items_users', 'items.id', "=", 'items_users.items_id')
                            ->where('items_users.users_id', "=", Session::get('user')->id)
                            ->count();

            // feed count
            $count['feeds'] = DB::table('feeds')
                            ->join('feeds_users', 'feeds.id', '=', 'feeds_users.feeds_id')
                            ->where('feeds_users.users_id', '=', Session::get('user')->id)
                            ->count();

            //return $count['feeds'];


            return View::make('account/index')
                    ->with(array(
                    'first_name' => Session::get('user')->first_name,
                    'last_name' => Session::get('user')->last_name,
                    'feeds' => $feeds,
                    'items' => $items,
                    'count' => $count
                ));
        }
        else {
            // if user not logged in
            return View::make('index');
        }
    }

}