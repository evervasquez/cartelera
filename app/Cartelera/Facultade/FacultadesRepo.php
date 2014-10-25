<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 10:05 AM
 */

namespace Cartelera\Facultade;


class FacultadesRepo
{
    public function listar()
    {
        $rows = \DB::table('facultades')
            ->where(function ($query) {
                $query->where('DescripcionFacultad', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('Decano', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('DescripcionFacultadIngles', 'LIKE', '%' . \Input::get('search') . '%');
                $query->orWhere('Abreviatura', 'LIKE', '%' . \Input::get('search') . '%');
            })
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = \DB::table('facultades')
                ->select('CodigoFacultad', 'DescripcionFacultad', 'DescripcionFacultadIngles',
                    'Decano', 'Abreviatura')
                ->where(function ($query) {
                    $query->where('DescripcionFacultad', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('Decano', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('DescripcionFacultadIngles', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('Abreviatura', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = \DB::table('facultades')
                ->select('CodigoFacultad', 'DescripcionFacultad', 'DescripcionFacultadIngles',
                    'Decano', 'Abreviatura')
                ->where(function ($query) {
                    $query->where('DescripcionFacultad', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('Decano', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('DescripcionFacultadIngles', 'LIKE', '%' . \Input::get('search') . '%');
                    $query->orWhere('Abreviatura', 'LIKE', '%' . \Input::get('search') . '%');
                })
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy('CodigoFacultad', 'DESC')
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