<?php
/**
* Created by PhpStorm.
 * User: eveR Vásquez
* Date: 23/10/14
* Time: 01:07 PM
*/

namespace Cartelera\Permiso;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Permiso extends \Eloquent {
	    protected $fillable = [];
        use SoftDeletingTrait;
        protected $dates = ['deleted_at'];
        protected $hidden = array('created_at','updated_at','deleted_at');
}