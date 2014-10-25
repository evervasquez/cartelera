<?php
use Cartelera\Alumno\AlumnoRepo;
class AlumnosController extends \BaseController {
    protected $alumnoRepo;

    public function __construct(AlumnoRepo $alumnoRepo)
    {
        $this->alumnoRepo = $alumnoRepo;
    }
    public function index()
    {
        return View::make('alumnos/index');
    }

    public function listar()
    {
        return $this->alumnoRepo->listar();
    }
}