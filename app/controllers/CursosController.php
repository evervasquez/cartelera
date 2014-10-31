<?php
use Cartelera\Curso\CursoRepo;

class CursosController extends \BaseController
{
    protected $cursosRepo;

    public function __construct(CursoRepo $cursoRepo)
    {
        $this->cursosRepo = $cursoRepo;
    }

    /**
     * Display a listing of the resource.
     * GET /cursos
     *
     * @return Response
     */
    public function index()
    {
        $datos = $this->cursosRepo->getCursos();
        return $datos;
    }

    /**
     * Show the form for creating a new resource.
     * GET /cursos/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /cursos
     *
     * @return Response
     */
    public function store()
    {
        return "hola";
    }

    /**
     * Display the specified resource.
     * GET /cursos/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /cursos/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /cursos/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /cursos/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}