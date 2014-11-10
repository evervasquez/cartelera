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
    private $semestre;
    public function selectAll()
    {
        $this->CodigoAlumno = \Auth::user()->codigo;

            $this->semestre = $this->getMaxSemestre();

            $cursosAlumnos = \DB::table('cursos')
                ->join('detalle_matricula', 'cursos.CodigoCurso', '=', 'detalle_matricula.CodigoCurso')
                ->where('detalle_matricula.CodigoAlumno', '=', $this->CodigoAlumno)
                ->where('detalle_matricula.CodigoSemestre', '=', $this->semestre)
                ->select('cursos.CodigoCurso', 'cursos.DescripcionCurso', 'cursos.CodCursoSira');

            $cursosSubTotales = \DB::table('cursos')
                ->join('carga_academica', 'cursos.CodigoCurso', '=', 'carga_academica.CodigoCurso')
                ->where(function($query){
                    $query->where('carga_academica.CodigoProfesor', '=', $this->CodigoAlumno)
                        ->where('carga_academica.CodigoSemestre', '=', $this->semestre);
                })
                ->select('cursos.CodigoCurso', 'cursos.DescripcionCurso', 'cursos.CodCursoSira')
                ->union($cursosAlumnos);

            $cursosTotales = \DB::table('cursos')
                ->where(function($query)
                {
                    if(\Auth::user()->idperfil == 1){
                    $query->where('CodigoCurso', '=', '0000000000');
                    }else{
                        $query->where('CodigoCurso', '=', '000000');
                    }
                })
                ->select('cursos.CodigoCurso', 'cursos.DescripcionCurso', 'cursos.CodCursoSira')
                ->union($cursosSubTotales)
                ->get();

        return $cursosTotales;
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