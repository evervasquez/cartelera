<?php
use Cartelera\User\UserRepo;

class UsersController extends \BaseController
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return View::make('users/index');
    }

    public function listar()
    {
        return $this->userRepo->listar();
    }

    public function editar()
    {
        $datos = Input::all();
        $manager = new UsersValidadores($this->userRepo->newUser(),$datos);
        return $this->baseEditar($this->userRepo,$manager,$datos);
    }

    public function nuevo()
    {
        $datos = Input::all();
        $manager = new UsersValidadores($this->userRepo->newUser(),$datos);
        return $this->baseNuevo($this->userRepo,$manager,$datos);
    }

    public function eliminar()
    {
        $id = Input::get('id');
        return $this->userRepo->eliminar($id);
    }
}