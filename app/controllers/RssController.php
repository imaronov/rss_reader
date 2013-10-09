<?php

class RssController extends BaseController {

    public function addNew() {
        /*
         *  for ajax call
         */

        //gets url from user
        $url = Input::get('url');

        try{
            $xml = simplexml_load_file($url);
            //return Response::json(array($xml));

            // parse feed
              $feed = Feed::create(array(
                'name' => $xml->channel->title,
                'url' => $xml->channel->link,
                'url_md5' => md5($xml->channel->link)
            ));

            // connect feed to user
            Feeds_user::create(array(
                'feeds_id' => $feed->id,
                'users_id' => Session::get('user')->id,
                'favorite' => 0
            ));

            // parse items
            $itemCount = sizeof($xml->channel->item);
            for($i = 0; $i < $itemCount; $i++) {
                // TODO: filter and clean-up the description to remove any unwanted tags and images


                $item = Item::create(array(
                    'feeds_id' => $feed->id,
                    'title' => $xml->channel->item[$i]->title,
                    'link' => $xml->channel->item[$i]->link,
                    'link_md5' => md5($xml->channel->item[$i]->link),
                    'description' => $xml->channel->item[$i]->description,
                    'pubDate' => date( "Y-m-d H:i:s", strtotime($xml->channel->item[$i]->pubDate))
                ));

                // connect item to user
                Items_user::create(array(
                    'items_id' => $item->id,
                    'users_id' => Session::get('user')->id,
                    'favorite' => 0
                ));
            }
            return Redirect::to('/account');

        } catch(ErrorException $ee){
            // if it is not a valid xml feed
            App::abort('Invalid url.');

        }
    }

    public function search() {
        // TODO: build search queries

    }
}