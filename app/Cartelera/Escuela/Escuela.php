<?php
namespace Cartelera\Escuela;

class Escuela extends \Eloquent
{
    protected $fillable = [];
    protected $table = "escuelaprofesional";
    protected $primaryKey = array("CodigoEscuela","CodigoFacultad");
    public $timestamps = false;
}