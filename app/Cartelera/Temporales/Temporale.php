<?php
namespace Cartelera\Temporales;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Temporale extends \Eloquent {
	    protected $fillable = [];
        protected $hidden = array('created_at','updated_at');
}