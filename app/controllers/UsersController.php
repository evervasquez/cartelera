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

    public function changePassword()
    {
        $data = Input::all();
        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'password_again' => 'required|same:password',

        ];
        $validation = Validator::make($data, $rules);
        if ($validation->passes()) {
            if ($this->userRepo->changePassword($data)) {
                if (Session::has('iduser')) {
                    Session::flush();
                    if (!Auth::check()) {
                        return Redirect::to('/')
                            ->with('global', 'Tu contraseña ha sido cambiada, ingresa nuevamente con tu nueva contraseña');
                    } else {
                        return Redirect::route('usuario.perfil')
                            ->with('global', 'Tu contraseña ha sido cambiada, ingresa nuevamente con tu nueva contraseña');
                    }
                } else {
                    return Redirect::route('usuario.perfil')
                        ->with('global', 'Tu contraseña ha sido cambiada.');
                }
            } else {
                if (Session::has('iduser')) {
                    return \Redirect::back()->withInput()->withErrors($validation->messages())->with('error', 'tu contraseña antigua, no es la misma');
                } else {
                    return Redirect::route('usuario.perfil')
                        ->with('error', 'Tu contraseña antigua no es correcta.');
                }
            }
        } else {
            return \Redirect::back()->withInput()->withErrors($validation->messages())->with('error', ' hubo algunos errores al llenar los campos, trate de arreglarlos');
        }
    }

}