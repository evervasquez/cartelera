<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 22/10/14
 * Time: 04:24 PM
 */

namespace Cartelera\User;


use Cartelera\Alumno\Alumno;

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

    /*
     * Usuarios que no estan registrados en la tabla usuarios
     */

    public function findUsuario($usuario)
    {
        $count = User::whereNull('deleted_at')
            ->where('usuario', '=', $usuario)
            ->count();
        return $count;
    }

    public function findPosibleUsuario($codigo, $clave)
    {
        $response = null;
        $count = Alumno::where('CodAlumnoSira', '=', $codigo)
            ->where('CodAlumnoSira', '=', $clave)
            ->count();

        if ($count > 0) {
            $response = \DB::table('alumnos')
                ->where('CodAlumnoSira', '=', $codigo)
                ->where('CodAlumnoSira', '=', $clave)
                ->select("NombreAlumno as nombre",
                    'ApellidoPaterno as apellido',
                    "CodigoEscuela",
                    "CodigoAlumno as codigo", "CodAlumnoSira as usuario", "CodigoFacultad")
                ->get();
            if ($response != null) {
                $id = $this->InsertUser(\Utils::objectToArray($response[0]), 3);
                \Session::put('iduser', $id);
            }
        } else {
            $response = \DB::table('profesores')
                ->where('NumDocumento', '=', $codigo)
                ->where('NumDocumento', '=', $clave)
                ->select("NombreProfesor as nombre",
                    'ApellidoPaterno as apellido',
                    "NumDocumento as usuario", "CodigoProfesor as codigo")
                ->get();
            if ($response != null) {
                $id = $this->InsertUser(\Utils::objectToArray($response[0]), 2);
                \Session::put('iduser', $id);
            }
        }
        return $response;
    }

    private function InsertUser($datos, $perfil)
    {
        $usuario = new User();
        $usuario->nombres = \CastTexto::castUtf8(ucwords(strtolower($datos['nombre'])));
        $usuario->apellidos = \CastTexto::castUtf8(ucwords(strtolower($datos['apellido'])));
        $usuario->usuario = $datos['usuario'];
        $usuario->password = \Hash::make($datos['usuario']);
        $usuario->codigo = $datos['codigo'];
        $usuario->idperfil = $perfil;

        if (isset($datos['CodigoEscuela']))
            $usuario->idfacultad = $datos['CodigoFacultad'];

        if (isset($datos['CodigoEscuela']))
            $usuario->idescuela = $datos['CodigoEscuela'];

        $usuario->save();
        $idmax = \DB::table('users')->whereNull('deleted_at')->max('id');
        return $idmax;
    }

    public function getUsersPerfil($codigo)
    {
        $datos = null;
        $count = Alumno::where('CodigoAlumno', '=', $codigo)
            ->count();
        if ($count > 0) {
            $datos = \DB::table('users')
                ->join('facultades', 'users.idfacultad', '=', 'facultades.CodigoFacultad')
                ->join('escuelaprofesional', 'users.idescuela', '=', 'escuelaprofesional.CodigoEscuela')
                ->join('alumnos', 'users.codigo', '=', 'alumnos.CodigoAlumno')
                ->where('users.codigo', '=', $codigo)
                ->select('users.id', 'users.codigo', 'users.usuario','users.email',
                    'facultades.DescripcionFacultad as facultad', 'facultades.Abreviatura',
                    'escuelaprofesional.DescripcionEscuela as escuela',
                    'alumnos.NombreAlumno as nombres', 'alumnos.ApellidoPaterno as apellidopaterno',
                    'alumnos.ApellidoMaterno as apellidomaterno',
                    'users.email as correo')
                ->get();
        } else {
            $datos = \DB::table('users')
                ->join('profesores', 'users.codigo', '=', 'profesores.CodigoProfesor')
                ->where('users.codigo', '=', $codigo)
                ->select('users.id', 'users.codigo', 'users.usuario',
                    'profesores.NombreProfesor as nombres', 'profesores.ApellidoPaterno as apellidopaterno',
                    'profesores.ApellidoMaterno as apellidomaterno',
                    'users.email as correo')
                ->get();
        }
        return $datos;
    }



    public function changePassword($data)
    {
        if(\Auth::check())
            $user = User::find(\Auth::user()->id);

        if(\Session::get('iduser'))
            $user =  User::find(\Session::get('iduser'));

        $old_password = $data['old_password'];
        $password = $data['password'];

        if (\Hash::check($old_password, $user->getAuthPassword())) {
            $user->password = \Hash::make($password);
            return $user->save();
        }
    }

    public function updatePerfil($data)
    {
        $user = User::find(\Auth::user()->id);
        if (isset($data['email'])) {
            $user->email = $data['email'];
        }
        return $user->save();
    }

    public function updatePhotoPerfil($datos)
    {
        $user = User::find(\Auth::user()->id);
        $user->email = $datos['email'];
        $user->fotoperfil = $datos['id'].'.jpeg';
        return $user->save();
    }
} 