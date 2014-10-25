<?php
use Cartelera\Perfile\PerfileRepo;
use Cartelera\Perfile\PerfileManager;
class PerfilesController extends \BaseController
{
    protected $perfilRepo;

    public function __construct(PerfileRepo $perfilRepositorio)
    {
        $this->perfilRepo = $perfilRepositorio;
    }

    public function index()
    {
        return View::make('perfiles/index');
    }

    public function listar()
    {
        return $this->perfilRepo->listar();
    }

    public function editar()
    {
        $datos = Input::all();
        $manager = new PerfileManager($datos);
        return $this->baseEditar($this->perfilRepo,$manager,$datos);
    }

    public function nuevo()
    {
        $datos = Input::all();
        $manager = new PerfileManager($datos);
        return $this->baseNuevo($this->perfilRepo,$manager,$datos);
    }

    public function eliminar()
    {
        $id = Input::get('id');
        return $this->perfilRepo->eliminar($id);
    }

    public function getPerfiles()
    {
        return $this->perfilRepo->getPerfiles();
    }
}