<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 10:19 AM
 */

namespace Cartelera\Escuela;


class EscuelaRepo {

    public function listar()
    {
        $rows = \DB::table('escuelaprofesional')
            ->join('facultades','escuelaprofesional.CodigoFacultad','=','facultades.CodigoFacultad')
            ->where(function ($query) {
                $query->where('escuelaprofesional.DescripcionEscuela', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('escuelaprofesional.DescripcionAlterna', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('escuelaprofesional.Abreviatura', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('facultades.DescripcionFacultad', 'LIKE', '%' . \Input::get('search') . '%');
            })
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = \DB::table('escuelaprofesional')
                ->join('facultades','escuelaprofesional.CodigoFacultad','=','facultades.CodigoFacultad')
                ->select('escuelaprofesional.CodigoEscuela', 'facultades.DescripcionFacultad as facultad',
                    'escuelaprofesional.DescripcionEscuela', 'escuelaprofesional.DescripcionAlterna',
                    'escuelaprofesional.Abreviatura')
                ->where(function ($query) {
                    $query->where('escuelaprofesional.DescripcionEscuela', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('escuelaprofesional.DescripcionAlterna', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('escuelaprofesional.Abreviatura', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = \DB::table('escuelaprofesional')
                ->join('facultades','escuelaprofesional.CodigoFacultad','=','facultades.CodigoFacultad')
                ->select('escuelaprofesional.CodigoEscuela', 'facultades.DescripcionFacultad as facultad',
                    'escuelaprofesional.DescripcionEscuela', 'escuelaprofesional.DescripcionAlterna',
                    'escuelaprofesional.Abreviatura')
                ->where(function ($query) {
                    $query->where('escuelaprofesional.DescripcionEscuela', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('escuelaprofesional.DescripcionAlterna', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('escuelaprofesional.Abreviatura', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy('escuelaprofesional.CodigoEscuela', 'DESC')
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