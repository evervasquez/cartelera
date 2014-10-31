<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 27/10/14
 * Time: 02:42 PM
 */

namespace Cartelera\Curso;


use Cartelera\Base\BaseRepo;
use Cartelera\Base\BaseRepoInterface;

class CursoRepo extends BaseRepo implements BaseRepoInterface
{
    private $CodigoAlumno;

    public function selectAll()
    {
        $this->CodigoAlumno = \Auth::user()->codigo;

        $semestre = $this->getMaxSemestre();

        $cursos = \DB::table('cursos')
            ->join('detalle_matricula', 'cursos.CodigoCurso', '=', 'detalle_matricula.CodigoCurso')
            ->where('detalle_matricula.CodigoAlumno', '=', $this->CodigoAlumno)
            ->where('detalle_matricula.CodigoSemestre', '=', $semestre)
            ->select('cursos.CodigoCurso', 'cursos.DescripcionCurso', 'cursos.CodCursoSira')
            ->get();
        return $cursos;
    }

    public function find($id)
    {
        return false;
    }

    public function getCursos()
    {
        $cursos['cursos'] = $this->selectAll();
        $cursos['tipos'] = \DB::table('tipocomunicados')
            ->whereNull('deleted_at')
            ->select('id', 'descripcion')
            ->get();
        $cursos['posiciones'] = \DB::table('posicions')
            ->whereNull('deleted_at')
            ->select('id', 'posicion')
            ->get();

        return $cursos;
    }
} 