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

class Feed extends Eloquent{

    protected $table = 'feeds';

    protected $fillable = array('name', 'url', 'url_md5', 'updated_at');
    protected $guarded = array('id', 'created_at');


    public function feeds_users() {
        return $this->hasMany('Feeds_user', 'feeds_id');
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getUrl() {
        return $this->url;
    }
}