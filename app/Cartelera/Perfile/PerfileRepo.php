<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 23/10/14
 * Time: 12:24 PM
 */

namespace Cartelera\Perfile;


class PerfileRepo
{

    public function listar()
    {
        $rows = Perfile::whereNull('deleted_at')
            ->where('descripcion', 'LIKE', '%' . \Input::get('search') . '%')
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = Perfile::select('id', 'descripcion as Perfile')
                ->whereNull('deleted_at')
                ->where('descripcion', 'LIKE', '%' . \Input::get('search') . '%')
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = Perfile::select('id', 'descripcion as Perfile')
                ->whereNull('deleted_at')
                ->where('descripcion', 'LIKE', '%' . \Input::get('search') . '%')
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
        $Perfile = Perfile::find($datos['id']);
        $Perfile->descripcion = $datos['Perfile'];
        $Perfile->save();
    }


    public function nuevo($datos)
    {
        $idmax = \DB::table('perfiles')->max('id');
        $Perfiles = new Perfile();
        $Perfiles->id = $idmax + 1;
        $Perfiles->descripcion = $datos['Perfile'];
        $Perfiles->save();
        $idmax = \DB::table('perfiles')->max('id');

        $Perfile = Perfile::find($idmax);

        $toView = array(
            "id" => $Perfile->id,
            "1" => $Perfile->descripcion,
            "Perfile" => $Perfile->descripcion
        );

        return $toView;
    }


    public function eliminar($id)
    {
        $Perfile = Perfile::find($id);
        if ($Perfile->delete()) {
            return \Response::json(array(
                "Result" => 'OK'
            ));
        }
    }

    public function getPerfiles()
    {
        $Perfiles = Perfile::select('id', 'descripcion')
            ->whereNull('deleted_at')
            ->get();

        $rows = array();

        foreach ($Perfiles as $Perfile) {
            $eil = array();
            $eil["DisplayText"] = $Perfile->descripcion;
            $eil["Value"] = $Perfile->id;
            $rows[] = $eil;
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $rows;

        return json_encode($jTableResult);
    }

} 