<?php
/**
 * Created by PhpStorm.
 * User: eveR Vásquez
 * Date: 23/10/14
 * Time: 01:07 PM
 */

namespace Cartelera\Permiso;


class PermisoRepo {

    public function listar()
    {
        $permisos = \DB::table('modulos as m')
            //->join('modulos as m', 'permisos.idmodulo', '=', 'm.id')
            ->whereNull('m.deleted_at')
            ->where('m.idpadre', '<>', 1)
            ->select('m.id', 'm.descripcion as modulo')
            ->orderBy('m.descripcion')
            ->groupBy('m.id')
            ->get();

        return \Response::json(array(
            "validation_failed" => 0,
            "Records" => $permisos
        ));
    }

    public function getPermisos($perfil)
    {
        $permisos = \DB::table('permisos')
            ->join('modulos as m', 'permisos.idmodulo', '=', 'm.id')
            ->whereNull('permisos.deleted_at')
            ->where('permisos.idperfil', '=', $perfil)
            ->where('m.idpadre', '<>', 1)
            ->select('permisos.id', 'm.descripcion as modulo')
            ->orderBy('m.descripcion')
            ->get();

        return \Response::json(array(
            "validation_failed" => 0,
            "Records" => $permisos
        ));
    }

    public function nuevo($datos)
    {
        $permiso = new Permiso();
        $permiso->idperfil = $datos['idperfil'];
        $permiso->idmodulo = $datos['id'];

        return $permiso->save();
    }

    public function eliminar($datos)
    {
        $permiso = Permiso::find($datos['id']);
        if ($permiso->delete()) {
            return \Response::json(array(
                "validation_failed" => 0
            ));
        }else{
            return \Response::json(array(
                "validation_failed" => 1
            ));
        }
    }
} 