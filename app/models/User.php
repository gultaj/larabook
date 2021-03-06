<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = ['username', 'email', 'password'];

    public static $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

    public static $authRules = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function statuses()
    {
        return $this->hasMany('Status');
    }

    public function follows()
    {
        return $this->belongsToMany('User', 'follows', 'user_id', 'followed_id')->withTimestamps();
    }

    public function followed(User $user)
    {
        $ids = $user->follows()->lists('followed_id');

        return in_array($this->id, $ids);
    }

    public function followers()
    {
        return $this->belongsToMany('User', 'follows', 'followed_id', 'user_id')->withTimestamps();
    }
}
