<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 01/11/14
 * Time: 04:28 PM
 */

namespace Cartelera\VotosComunicados;


use Carbon\Carbon;
use Cartelera\Comunicados\Comunicado;

class VotosComunicadoRepo
{

    public function saveVisto($datos)
    {
        $user_id = \Auth::user()->id;

        $voto = \DB::table('votos_comunicados')
            ->where('user_id', '=', $user_id)
            ->where('comunicado_id', '=', $datos['comunicado_id'])
            ->select('id', 'visto')
            ->get();

        $totalvisto = \DB::table('comunicados')
            ->select('cant_visto', 'totalmegusta', 'totalnomegusta')
            ->get();

        if (count($voto) == 0) {
            $comunicado = Comunicado::find($datos['comunicado_id']);
            $comunicado->cant_visto = $totalvisto[0]->cant_visto + 1;
            $comunicado->save();

            $votos = new VotosComunicado();
            $votos->visto = 1;
            $votos->user_id = $user_id;
            $votos->comunicado_id = $datos['comunicado_id'];
            $votos->fechahora = Carbon::now();


        } else {
            $votos = VotosComunicado::find($voto[0]->id);
            $votos->visto = $voto[0]->visto + 1;

            if (isset($datos['megusta'])) {
                $votos->megusta = $datos['megusta'];

                //cargamos el megusta
                $comunicado = Comunicado::find($datos['comunicado_id']);
                $comunicado->totalmegusta = $totalvisto[0]->totalmegusta + 1;
                $comunicado->save();

            } else if (isset($datos['nomegusta'])) {
                $votos->megusta = $datos['nomegusta'];

                //cargamos el no megusta
                $comunicado = Comunicado::find($datos['comunicado_id']);
                $comunicado->totalnomegusta = $totalvisto[0]->totalnomegusta + 1;
                $comunicado->save();
            }
        }

        if ($votos->save()) {
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