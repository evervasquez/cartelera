<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 11:44 AM
 */

namespace Cartelera\Profesores;


class ProfesorRepo {

    public function listar()
    {
        $rows = \DB::table('profesores')
            ->where(function ($query) {
                $query->where('ApellidoPaterno', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('ApellidoMaterno', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('NombreProfesor', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('CodigoProfesor', 'LIKE', '%' . \Input::get('search') . '%');
            })
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = \DB::table('profesores')
                ->select('CodigoProfesor',
                    \DB::raw('"ApellidoPaterno"||\' \'||"ApellidoMaterno"||\' \'||"NombreProfesor" as fullname'),
                    'Email','Telefono')
                ->where(function ($query) {
                    $query->where('ApellidoPaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('ApellidoMaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('NombreProfesor', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('CodigoProfesor', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = \DB::table('profesores')
                ->select('CodigoProfesor',
                    \DB::raw('"ApellidoPaterno"||\' \'||"ApellidoMaterno"||\' \'||"NombreProfesor" as fullname'),
                    'Email','Telefono')
                ->where(function ($query) {
                    $query->where('ApellidoPaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('ApellidoMaterno', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('NombreProfesor', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('CodigoProfesor', 'LIKE', '%' . \Input::get('search') . '%');
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