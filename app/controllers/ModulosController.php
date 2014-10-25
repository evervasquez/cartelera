<?php
use Cartelera\Modulo\ModuloRepo;
use Cartelera\Modulo\ModuloManager;

class ModulosController extends \BaseController
{
    protected $moduloRepo;

    public function __construct(ModuloRepo $moduloRepo)
    {
        $this->moduloRepo = $moduloRepo;
    }

    public function getModulos()
    {
        return $this->moduloRepo->getModulos();
    }

    public function index(){
        return View::make('modulos/index');
    }

    public function listar()
    {
        return $this->moduloRepo->listar();
    }

    public function editar()
    {
        $datos = Input::all();
        $manager = new ModuloManager($datos);
        return $this->baseEditar($this->moduloRepo, $manager, $datos);
    }

    public function nuevo()
    {
        $datos = Input::all();
        $manager = new ModuloManager($datos);
        return $this->baseNuevo($this->moduloRepo, $manager, $datos);
    }

    public function eliminar()
    {
        $id = Input::get('id');
        return $this->moduloRepo->eliminar($id);
    }

    public function padres()
    {
        return $this->moduloRepo->padres();
    }

}