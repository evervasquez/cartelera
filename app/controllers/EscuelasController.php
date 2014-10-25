<?php
use Cartelera\Escuela\EscuelaRepo;

class EscuelasController extends \BaseController
{
    protected $escuelRepo;

    public function __construct(EscuelaRepo $escuelaRepo)
    {
        $this->escuelRepo = $escuelaRepo;
    }

    public function index()
    {
        return View::make('escuelas/index');
    }

    public function listar()
    {
        return $this->escuelRepo->listar();
    }
}