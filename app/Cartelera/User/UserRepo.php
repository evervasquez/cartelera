<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 22/10/14
 * Time: 04:24 PM
 */

namespace Cartelera\User;


class UserRepo
{
    public function listar()
    {
        $rows = \DB::table('users as u')
            ->join('perfiles as p', 'u.idperfil', '=', 'p.id')
            ->whereNull('u.deleted_at')
            ->whereNull('p.deleted_at')
            ->where(function ($query) {
                $query->where('u.nombres', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('u.apellidos', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('u.usuario', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('u.email', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('p.descripcion', 'LIKE', '%' . \Input::get('search') . '%');
            })
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = \DB::table('users as u')
                ->join('perfiles as p', 'u.idperfil', '=', 'p.id')
                ->select('u.id', 'u.nombres', 'u.apellidos', 'u.usuario as usuario', 'u.password as clave', 'u.email', 'u.idperfil as perfil', 'u.telefono', 'u.email as email', 'u.idfacultad as facultad')
                ->whereNull('u.deleted_at')
                ->whereNull('p.deleted_at')
                ->where(function ($query) {
                    $query->where('u.nombres', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('u.apellidos', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('u.usuario', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('u.email', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('p.descripcion', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = \DB::table('users as u')
                ->join('perfiles as p', 'u.idperfil', '=', 'p.id')
                ->select('u.id', 'u.nombres', 'u.apellidos', 'u.usuario as usuario', 'u.password as clave', 'u.email', 'u.idperfil as perfil', 'u.telefono', 'u.email as email', 'u.idfacultad as facultad')
                ->whereNull('u.deleted_at')
                ->whereNull('p.deleted_at')
                ->where(function ($query) {
                    $query->where('u.nombres', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('u.apellidos', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('u.usuario', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('u.email', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('p.descripcion', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->get();
        }
        return \Response::json(
            array(
                "Result" => "OK",
                "TotalRecordCount" => $rows,
                "Records" => $data
            )
        );
    }

    public function editar($datos)
    {
        $user = User::find($datos['id']);
        $user->username = $datos['usuario'];
        $user->email = $datos['email'];
        $user->nombres = $datos['nombres'];
        $user->apellidos = $datos['apellidos'];
        $user->idperfil = $datos['perfil'];
        $user->direccion = $datos['direccion'];
        $user->dni = $datos['dni'];
        $user->fechanacimiento = $datos['fecha_nacimiento'];
        $user->telefono = $datos['telefono'];
        $user->idsucursal = $datos['sucursal'];
        $user->save();
    }

    public function nuevo($datos)
    {
        $users = new User();
        $users->codigo = $datos['codigo'];
        $users->idperfil = $datos['idperfil'];
        $users->idfacultad = $datos['idfacultad'];
        $users->idescuela = $datos['idescuela'];
        $users->nombres = $datos['nombres'];
        $users->apellidos = $datos['apellidos'];
        $users->telefono = $datos['telefono'];
        $users->email = $datos['email'];
        $users->usuario = $datos['usuario'];
        $users->password = \Hash::make($datos['password']);
        $users->save();

        $idmax = \DB::table('users')->max('id');

        $user = User::find($idmax);

        $toView = array(
            "id" => $user->id,
            "1" => $user->id,
            "codigo" => $user->codigo,
            "2" => $user->codigo,
            "idperfil" => $user->idperfil,
            "3" => $user->idperfil,
            "idfacultad" => $user->idfacultad,
            "4" => $user->idfacultad,
            "idescuela" => $user->idescuela,
            "5" => $user->idescuela,
            "nombres" => $user->nombres,
            "6" => $user->nombres,
            "apellidos" => $user->apellidos,
            "7" => $user->apellidos,
            "telefono" => $user->telefono,
            "8" => $user->telefono,
            "email" => $user->email,
            "9" => $user->email,
            "usuario" => $user->usuario,
            "10" => $user->usuario
        );

        return $toView;
    }

    public function eliminar($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return \Response::json(array(
                "Result" => 'OK'
            ));
        }
    }
} 