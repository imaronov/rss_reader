<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

	protected $table = 'users';

    protected $fillable = array('first_name','last_name', 'email', 'created_at', 'created_at', 'updated_at', 'password');
    protected $guarded = array('id', 'created_at');

    // one to many relationship
    public function feeds_user()
    {
        return $this->hasMany('Feeds_user', 'users_id');
    }

    // one to many relationship
    public function items_user()
    {
        return $this->hasMany('Item_user', 'users_id');
    }
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getlastName()
    {
        return $this->last_name;
    }
}