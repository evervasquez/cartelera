<?php
use Cartelera\Permiso\PermisoRepo;

class PermisosController extends \BaseController
{
    protected $permisoRepo;

    public function __construct(PermisoRepo $permisoRepositorio)
    {
        $this->permisoRepo = $permisoRepositorio;
    }

    public function index()
    {
        return View::make('permisos/index');
    }

    public function listar()
    {
        return $this->permisoRepo->listar();
    }

    public function getPermisos()
    {
        $idperfil = Input::get('id');
        return $this->permisoRepo->getPermisos($idperfil);
    }

    public function add()
    {
        $datos = Input::only('id', 'idperfil');

        $rules = [
            'id' => 'required|numeric'
        ];
        $validation = Validator::make($datos, $rules);

        if ($validation->passes()) {

            if (Request::ajax()) {
                if ($this->permisoRepo->nuevo($datos)) {

                    return \Response::json(
                        array(
                            "validation_failed" => 0,
                        )
                    );

                } else {
                    return \Response::json(
                        array(
                            "validation_failed" => 1,
                            "errors" => 'hubo un error al registrar permisos, Actualice su navegador porfavor'
                        )
                    );
                }
            }

        } else {
            return \Response::json(
                array(
                    "validation_failed" => 2,
                    "errors" => 'debe escoger un permiso para agregar'
                )
            );
        }

    }

    public function destroy()
    {
        $datos = Input::all('id');

        $rules = [
            'id' => 'required|numeric',
        ];
        $validation = Validator::make($datos, $rules);

        if ($validation->passes()) {
            if (Request::ajax()) {
                if ($this->permisoRepo->eliminar($datos)) {
                    return \Response::json(
                        array(
                            "validation_failed" => 0,
                        )
                    );
                } else {
                    return \Response::json(
                        array(
                            "validation_failed" => 1,
                            "errors" => $validation->errors()->toArray()
                        ));
                }
            }
        } else {
            return \Response::json(
                array(
                    "validation_failed" => 2,
                    "errors" => $validation->errors()->toArray()
                ));
        }
    }
}