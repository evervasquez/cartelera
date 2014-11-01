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

    public function saveVisto($comunicado_id)
    {
        $user_id = \Auth::user()->id;

        $voto = \DB::table('votos_comunicados')
            ->where('user_id', '=', $user_id)
            ->where('comunicado_id', '=', $comunicado_id)
            ->select('id', 'visto')
            ->get();

        if (count($voto) == 0) {
            $totalvisto = \DB::table('comunicados')
                            ->select('cant_visto')
                            ->get();

            $comunicado = Comunicado::find($comunicado_id);
            $comunicado->cant_visto = $totalvisto[0]->cant_visto + 1;
            $comunicado->save();

            $votos = new VotosComunicado();
            $votos->visto = 1;
            $votos->user_id = $user_id;
            $votos->comunicado_id = $comunicado_id;
            $votos->fechahora = Carbon::now();


        } else {
            $votos = VotosComunicado::find($voto[0]->id);
            $votos->visto = $voto[0]->visto + 1;
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