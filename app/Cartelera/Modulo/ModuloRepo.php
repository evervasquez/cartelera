<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 22/10/14
 * Time: 09:55 PM
 */

namespace Cartelera\Modulo;


use Cartelera\Base\BaseRepo;

class ModuloRepo extends BaseRepo{


    public function listar()
    {
        $rows = \DB::table('modulos as m')
            ->join('modulos as mp','m.idpadre','=','mp.id')
            ->where('m.id','<>','1')
            ->where(function($query){
                $query->where('m.descripcion','LIKE','%'.\Input::get('search').'%');
                $query->orWhere('m.url','LIKE','%'.\Input::get('search').'%');
                $query->orWhere('m.icono','LIKE','%'.\Input::get('search').'%');
                $query->orWhere('mp.descripcion','LIKE','%'.\Input::get('search').'%');
            })
            ->whereNull('m.deleted_at')
            ->whereNull('mp.deleted_at')
            ->count();

        if (\Input::get('jtSorting')) {

            $search = explode(" ", \Input::get('jtSorting'));
            $data = \DB::table('modulos as m')
                ->join('modulos as mp','m.idpadre','=','mp.id')
                ->select('m.id','m.descripcion as modulo','m.url','m.icono','m.idpadre as modulo_padre')
                ->where('m.id','<>','1')
                ->where(function($query){
                    $query->where('m.descripcion','LIKE','%'.\Input::get('search').'%');
                    $query->orWhere('m.url','LIKE','%'.\Input::get('search').'%');
                    $query->orWhere('m.icono','LIKE','%'.\Input::get('search').'%');
                    $query->orWhere('mp.descripcion','LIKE','%'.\Input::get('search').'%');
                })
                ->whereNull('m.deleted_at')
                ->whereNull('mp.deleted_at')
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy($search[0], $search[1])
                ->get();
        } else {
            $data = \DB::table('modulos as m')
                ->join('modulos as mp','m.idpadre','=','mp.id')
                ->select('m.id','m.descripcion as modulo','m.url','m.icono','m.idpadre as modulo_padre')
                ->where('m.id','<>','1')
                ->where(function($query){
                    $query->where('m.descripcion','LIKE','%'.\Input::get('search').'%');
                    $query->orWhere('m.url','LIKE','%'.\Input::get('search').'%');
                    $query->orWhere('m.icono','LIKE','%'.\Input::get('search').'%');
                    $query->orWhere('mp.descripcion','LIKE','%'.\Input::get('search').'%');
                })
                ->whereNull('m.deleted_at')
                ->whereNull('mp.deleted_at')
                ->skip(\Input::get('jtStartIndex'))
                ->take(\Input::get('jtPageSize'))
                ->orderBy('id','DESC')
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

    public function getModulos()
    {
        if (\Request::ajax()) {

            $menupadre = Modulo::whereNull('deleted_at')
                ->where('idpadre', '=', 1)
                ->where('id', '<>', 1)
                ->orderBy('descripcion','ASC')
                ->get();

            $cont = 0;
            $menu[] = '';

            $idperfil = \Auth::user()->idperfil;

            foreach ($menupadre as $valor) {
                $idpadre = $valor->id;

                $submenu = \DB::table('modulos')
                    ->join('permisos','modulos.id','=','permisos.idmodulo')
                    ->select('modulos.descripcion','modulos.url')
                    ->whereNull('modulos.deleted_at')
                    ->whereNull('permisos.deleted_at')
                    ->where('permisos.idperfil',$idperfil)
                    ->where('modulos.idpadre',$idpadre)
                    ->orderBy('modulos.descripcion','ASC')
                    ->get();
                if(!empty($submenu)){
                    $menu[$cont] = array(
                        'descripcion' => $valor->descripcion,
                        'icono' => $valor->icono,
                        'enlaces' => array()
                    );
                    $cont2 = 0;
                    foreach ($submenu as $key) {
                        $menu[$cont]['enlaces'][$cont2] = array(
                            'descripcion' => $key->descripcion,
                            'url' => $key->url
                        );
                        $cont2++;
                    }
                    $cont++;
                }
            }
            return $menu;
        }
    }

    public function padres()
    {
        $padres = Modulo::select('id','descripcion')
            ->whereNull('deleted_at')
            ->where('idpadre', '=', 1)
            ->get();

        $rows = array();

        foreach ($padres as $padre) {
            $eil = array();
            $eil["DisplayText"] = $padre->descripcion;
            $eil["Value"] = $padre->id;
            $rows[] = $eil;
        }

        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Options'] = $rows;

        return json_encode($jTableResult);
    }

    public function editar($datos)
    {
        $modulo = Modulo::find(\Input::get('id'));
        $modulo->descripcion = $datos['modulo'];
        $modulo->icono = $datos['icono'];
        $modulo->url = $datos['url'];
        $modulo->idpadre = $datos['modulo_padre'];
        $modulo->updated_at = $this->getUpdateAt();
        $modulo->save();
    }

    public function nuevo($datos)
    {
        $idmax = \DB::table('modulos')->max('id');

        $modulos = new Modulo();
        $modulos->id = $idmax + 1;
        $modulos->descripcion = $datos['modulo'];
        $modulos->icono = $datos['icono'];
        $modulos->url = $datos['url'];
        $modulos->idpadre = $datos['modulo_padre'];
        $modulos->created_at = $this->getCreatedAt();
        $modulos->updated_at = $this->getUpdateAt();
        $modulos->save();

        $idmax = \DB::table('modulos')->max('id');

        $modulo = Modulo::find($idmax);

        $toView = array(
            "id" => $modulo->id,
            "1" => $modulo->descripcion,
            "modulo" => $modulo->descripcion,
            "2" => $modulo->url,
            "url" => $modulo->url,
            "3" => $modulo->icono,
            "icono" => $modulo->icono,
            "4" => $modulo->idpadre,
            "modulo_padre" => $modulo->idpadre,
        );

        return $toView;
    }

    public function eliminar($id)
    {
        $modulo = Modulo::find($id);
        if ($modulo->delete()) {
            return \Response::json(array(
                "Result" => 'OK'
            ));
        }
    }

}