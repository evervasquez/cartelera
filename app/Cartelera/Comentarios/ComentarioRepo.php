<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 01/11/14
 * Time: 09:43 AM
 */

namespace Cartelera\Comentarios;

use Laravelrus\LocalizedCarbon\LocalizedCarbon;
use Carbon\Carbon;

class ComentarioRepo
{

    public function save($datos)
    {
        $user_id = \Auth::user()->id;
        $comentario = new Comentario();
        $comentario->user_id = $user_id;
        $comentario->comunicado_id = $datos['comunicado_id'];
        $comentario->comentario = $datos['comentario'];
        $comentario->fechahora = Carbon::now();

        if ($comentario->save()) {
            $idmax = \DB::table('comentarios')
                ->where('comunicado_id','=',$datos['comunicado_id'])
                ->max('id');

            $comentultimo = $this->find($idmax);

            //parse, para ver como humanos
            $last_login = new \DateTime();
            $timestamp = $last_login->getTimestamp();
            $tiempo = LocalizedCarbon::instance(new \DateTime($comentario->created_at))->diffForHumans(LocalizedCarbon::createFromTimestamp($timestamp));;
            $comentultimo[0]->fechahora =$tiempo;

            return \Response::json(array(
                "success" => "OK",
                "data" => $comentultimo
            ));
        }else{
            return \Response::json(array(
                "success" => "ERROR"
            ));
        }

    }

    public function find($id)
    {
        $comentario = \DB::table('comentarios')
            ->join('users','comentarios.user_id','=','users.id')
            ->where('comentarios.id','=',$id)
            ->whereNull('comentarios.deleted_at')
            ->select('comentarios.id','comentario','totalmegusta','totalnomegusta','fechahora','user_id',
                \DB::raw('"nombres"||\' \'||"apellidos" as fullname'),'users.fotoperfil')
            ->orderBy('comentarios.id','desc')
            ->get();

        $comentario[0]->like_comentario = \DB::table('votos_comentarios')
            ->where('user_id', '=', \Auth::user()->id)
            ->where('comentario_id', '=', $id)
            ->select('megusta', 'nomegusta')
            ->get();

        return $comentario;
    }
}