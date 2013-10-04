<?php
/**
 * Created by JetBrains PhpStorm.
 * User: arono_000
 * Date: 10/3/13
 * Time: 1:07 PM
 * To change this template use File | Settings | File Templates.
 */

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Feeds_user extends Eloquent{

    protected $table = 'feeds_users';

    protected $fillable = array('feeds_id', 'users_id', 'updated_at', 'favorite');
    protected $guarded = array('id', 'created_at');

    public function feeds() {
        return $this->hasMany('Feed', 'feeds_id');
    }

    public function users() {
        return $this->hasMany('User', 'users_id');
    }

    public function getFavorite() {
        return $this->favorite;
    }

    public function getFeedsId() {
        return $this->feeds_id;
    }

    public function getUsersId() {
        return $this->users_id;
    }
}