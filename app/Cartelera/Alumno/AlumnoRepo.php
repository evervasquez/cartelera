<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 11:06 AM
 */

namespace Cartelera\Alumno;


class AlumnoRepo {

    public function listar()
    {
        $rows = \DB::table('alumnos')
            ->join('escuelaprofesional','alumnos.CodigoEscuela','=','escuelaprofesional.CodigoEscuela')
            ->join('facultades','escuelaprofesional.CodigoFacultad','=','facultades.CodigoFacultad')
            ->where(function ($query) {
                $query->where('alumnos.ApellidoPaterno', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('alumnos.ApellidoMaterno', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('alumnos.NombreAlumno', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('alumnos.CodAlumnoSira', 'LIKE', '%' . \Input::get('search') . '%');
            })
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = \DB::table('alumnos')
                ->join('escuelaprofesional','alumnos.CodigoEscuela','=','escuelaprofesional.CodigoEscuela')
                ->join('facultades','escuelaprofesional.CodigoFacultad','=','facultades.CodigoFacultad')
                ->select('alumnos.CodAlumnoSira',
                    \DB::raw('"ApellidoPaterno"||\' \'||"ApellidoMaterno"||\' \'||"NombreAlumno" as fullname'),
                    'escuelaprofesional.DescripcionEscuela',
                    'alumnos.Email', 'alumnos.Telefono')
                ->where(function ($query) {
                    $query->where('alumnos.ApellidoPaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('alumnos.ApellidoMaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('alumnos.NombreAlumno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('alumnos.CodAlumnoSira', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = \DB::table('alumnos')
                ->join('escuelaprofesional','alumnos.CodigoEscuela','=','escuelaprofesional.CodigoEscuela')
                ->join('facultades','escuelaprofesional.CodigoFacultad','=','facultades.CodigoFacultad')
                ->select('alumnos.CodAlumnoSira',
                    \DB::raw('"ApellidoPaterno"||\' \'||"ApellidoMaterno"||\' \'||"NombreAlumno" as fullname'),
                    'escuelaprofesional.DescripcionEscuela',
                    'alumnos.Email', 'alumnos.Telefono')
                ->where(function ($query) {
                    $query->where('alumnos.ApellidoPaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('alumnos.ApellidoMaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('alumnos.NombreAlumno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('alumnos.CodAlumnoSira', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy('ApellidoPaterno')
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

} 