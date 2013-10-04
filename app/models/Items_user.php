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

class Items_user extends Eloquent{

    protected $table = 'items_users';

    protected $fillable = array('items_id', 'users_id', 'updated_at', 'favorite');
    protected $guarded = array('id', 'created_at');

    public function users() {
        return $this->hasMany('User', 'users_id');
    }

    public function items() {
        return $this->hasMany('Item', 'items_id');
    }

    public function getFavorite() {
        return $this->favorite;
    }

    public function getItemsId() {
        return $this->items_id;
    }

    public function getUsersId() {
        return $this->users_id;
    }
}