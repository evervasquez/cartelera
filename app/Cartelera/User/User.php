<?php
namespace Cartelera\User;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
    use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $dates = ['deleted_at'];
    protected $hidden = array('created_at','updated_at','deleted_at','password', 'remember_token');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}
