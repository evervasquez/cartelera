<?php
namespace Cartelera\Curso;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Curso extends \Eloquent
{
    protected $fillable = [];
    protected $primaryKey = "CodigoCurso";
    protected $table = 'cursos';
    public $timestamps = false;
}