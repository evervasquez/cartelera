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
use Laravelrus\LocalizedCarbon\LocalizedCarbon;

class ComunicadoRepo extends BaseRepo implements BaseRepoInterface
{
    private $temporizador = 1;

    public function selectAll()
    {
        $comunicados = \DB::table('comunicados')
            ->join('users','comunicados.user_id','=','users.id')
            ->join('cursos', 'comunicados.CodigoCurso', '=', 'cursos.CodigoCurso')
            ->join('detalle_matricula','cursos.CodigoCurso','=','detalle_matricula.CodigoCurso')
            ->whereNull('comunicados.deleted_at')
            ->where('detalle_matricula.CodigoAlumno','=',\Auth::user()->codigo)
            ->select('comunicados.id', 'cursos.DescripcionCurso', 'comunicado', 'titulo', 'comunicados.created_at', 'totalmegusta', 'totalnomegusta')
            ->orderBy('comunicados.id','desc')
            ->get();
        return $comunicados;
    }

    public function find($id)
    {
        $comunicado['comunicado'] = \DB::table('comunicados as c')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->join('cursos as cu', 'c.CodigoCurso', '=', 'cu.CodigoCurso')
            ->whereNull('c.deleted_at')
            ->where('c.id', '=', $id)
            ->select('c.id', 'cu.DescripcionCurso as curso', 'c.titulo', 'c.comunicado', 'c.created_at',
                'c.urlarchivo1', 'c.urlimagen1', 'c.urlarchivo2', 'c.urlimagen2',
                \DB::raw('"nombres"||\' \'||"apellidos" as usuario'))
            ->get();

        $comunicado['likes_comunicado'] = \DB::table('votos_comunicados')
            ->where('user_id', '=', \Auth::user()->id)
            ->where('comunicado_id', '=', $id)
            ->select('megusta', 'nomegusta')
            ->get();

        $comunicado['comentarios'] = \DB::table('comentarios')
            ->join('users', 'comentarios.user_id', '=', 'users.id')
            ->where('comentarios.comunicado_id', '=', $id)
            ->whereNull('comentarios.deleted_at')
            ->select('comentarios.id', 'comentario', 'fechahora', 'user_id','totalmegusta','totalnomegusta',
                \DB::raw('"nombres"||\' \'||"apellidos" as fullname'),'fotoperfil')
            ->orderBy('comentarios.id', 'asc')
            ->get();

        foreach ($comunicado['comentarios'] as $key => $comentario) {
            $last_login = new \DateTime();
            $timestamp = $last_login->getTimestamp();
            $tiempo = LocalizedCarbon::instance(new \DateTime($comentario->fechahora))->diffForHumans(LocalizedCarbon::createFromTimestamp($timestamp));;
            $comentario->fechahora = $tiempo;
            $comunicado['comentarios'][$key]->fechahora = $tiempo;

            $comunicado['comentarios'][$key]->like_comentario = \DB::table('votos_comentarios')
                ->where('user_id', '=', \Auth::user()->id)
                ->where('comentario_id', '=', $comentario->id)
                ->select('megusta', 'nomegusta')
                ->get();
        }

        return $comunicado;
    }

    public function save($datos)
    {

        if ($this->temporizador == 1) {
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

            \DB::table('temporales')->where('user_id', '=', $codigo)->delete();
            return $comunicado->save();
        }
    }

} 