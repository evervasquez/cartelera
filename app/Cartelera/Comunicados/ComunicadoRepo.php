<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 26/10/14
 * Time: 12:43 AM
 */

namespace Cartelera\Comunicados;

use Cartelera\Base\BaseRepo;
use Cartelera\Base\BaseRepoInterface;

class ComunicadoRepo extends BaseRepo implements BaseRepoInterface
{
    public function selectAll()
    {
        $comunicados = \DB::table('comunicados')
            ->get();
        return $comunicados;
    }

    public function find($id)
    {
        $comunicado = \DB::table('comunicados as c')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('cursos as cu', 'c.CodigoCurso', '=', 'cu.CodigoCurso')
            ->whereNull('c.deleted_at')
            ->where('c.id', '=', $id)
            ->select('c.id', 'cu.DescripcionCurso as curso', 'c.titulo', 'c.comunicado', 'c.created_at', 'c.totalmegusta',
                'c.totalnomegusta', 'c.urlarchivo1', 'c.urlimagen1','c.urlarchivo2', 'c.urlimagen2',
                \DB::raw('"nombres"||\' \'||"apellidos" as usuario'))
            ->get();
        return $comunicado;
    }

    public function save($datos)
    {
        $archivos = \DB::table('temporales')
            ->select('type', 'urlarchivo')
            ->get();

        $codigo = \Auth::user()->id;
        $comunicado = new Comunicado();
        $comunicado->user_id = $codigo;
        $comunicado->tipocomunicado_id = $datos['tipo'];
        $comunicado->posicion_id = $datos['posicion'];
        $comunicado->CodigoCurso = $datos['curso'];
        $comunicado->titulo = $datos['titulo'];
        $comunicado->comunicado = $datos['comunicado'];
        $comunicado->fechahora_inicio = $datos['fechainicio'];
        $comunicado->fechahora_fin = $datos['fechafin'];

        if (count($archivos) > 0) {
            $i = 0;
            foreach ($archivos as $archivo) {
                if ($archivo->type == 'image/jpeg') {
                    if ($i == 0) {
                        $comunicado->urlimagen1 = $archivo->urlarchivo;
                    } else {
                        $comunicado->urlimagen2 = $archivo->urlarchivo;
                    }
                } elseif ($archivo->type == 'image/jpg') {
                    if ($i == 0) {
                        $comunicado->urlimagen1 = $archivo->urlarchivo;
                    } else {
                        $comunicado->urlimagen2 = $archivo->urlarchivo;
                    }
                } elseif ($archivo->type == 'image/png') {
                    if ($i == 0) {
                        $comunicado->urlimagen1 = $archivo->urlarchivo;
                    } else {
                        $comunicado->urlimagen2 = $archivo->urlarchivo;
                    }
                } elseif ($archivo->type == 'application/pdf') {
                    if ($i == 0) {
                        $comunicado->urlarchivo1 = $archivo->urlarchivo;
                    } else {
                        $comunicado->urlarchivo2 = $archivo->urlarchivo;
                    }
                }
            }
        }
        $comunicado->created_at = $this->getCreatedAt();
        $comunicado->updated_at = $this->getUpdateAt();

        \DB::table('temporales')->delete();
        return $comunicado->save();
    }

} 