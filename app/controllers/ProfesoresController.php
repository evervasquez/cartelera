<?php
use Cartelera\Profesores\ProfesorRepo;
class ProfesoresController extends \BaseController {
    protected $profesorRepo;
    public function __construct(ProfesorRepo $profesorRepo)
    {
        $this->profesorRepo = $profesorRepo;
    }
    public function index()
    {
        return View::make('profesores/index');
    }

    public function listar()
    {
        return $this->profesorRepo->listar();
    }

}