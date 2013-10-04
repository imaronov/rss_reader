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

class Item extends Eloquent{

    protected $table = 'items';

    protected $fillable = array('title', 'link', 'link_md5', 'description', 'pubDate', 'feeds_id');
    protected $guarded = array('id', 'created_at');

    public function items_users() {
        return $this->hasMany('Items_user', 'items_id');
    }

    public function feeds() {
        return $this->belongsTo('Feed', 'feeds_id');
    }

    public function getTitle() {
        return $this->title;
    }

    public function getLink() {
        return $this->link;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPubDate() {
        return $this->pubDate;
    }
}