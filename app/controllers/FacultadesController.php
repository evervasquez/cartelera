<?php
use Cartelera\Facultade\FacultadesRepo;

class FacultadesController extends \BaseController
{
    protected $facultadRepo;

    public function __construct(FacultadesRepo $facultadesRepo)
    {
        $this->facultadRepo = $facultadesRepo;
    }

    public function index()
    {
        return View::make('facultades/index');
    }

    public function listar()
    {
        return $this->facultadRepo->listar();
    }

}