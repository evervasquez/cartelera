<?php

namespace Cartelera\VotosComentarios;

use Carbon\Carbon;
use Cartelera\Comentarios\Comentario;

class VotosComentarioRepo
{

    public function saveMegusta($datos)
    {
        $votos = new VotosComentario();
        $votos->user_id = \Auth::user()->id;
        $votos->comentario_id = $datos['comentario_id'];
        $votos->fechahora = Carbon::now();

        if (isset($datos['megusta'])) {
            $votos->megusta = $datos['megusta'];
        } elseif (isset($datos['nomegusta'])) {
            $votos->nomegusta = $datos['nomegusta'];
        }

        if ($votos->save()) {

            $comentario = \DB::table('comentarios')
                ->where('id', '=', $datos['comentario_id'])
                ->select('totalmegusta', 'totalnomegusta')
                ->get();

            if (isset($datos['megusta'])) {
                $coment = Comentario::find($datos['comentario_id']);
                $coment->totalmegusta = $comentario[0]->totalmegusta + 1;
                $coment->save();
            } elseif (isset($datos['nomegusta'])) {
                $coment = Comentario::find($datos['comentario_id']);
                $coment->totalnomegusta = $comentario[0]->totalnomegusta + 1;
                $coment->save();
            }

            return \Response::json(array(
                "Result" => "OK"
            ));
        } else {
            return \Response::json(array(
                "Result" => "ERROR"
            ));
        }
    }
} 