<?php
use Cartelera\Comentarios\ComentarioRepo;

class ComentariosController extends \BaseController
{
    protected $comentRepo;

    public function __construct(ComentarioRepo $comentarioRepo)
    {
        $this->comentRepo = $comentarioRepo;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /comentarios/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /comentarios
     *
     * @return Response
     */
    public function store()
    {
        $datos = Input::all();
        return $this->comentRepo->nuevo($datos);
    }

    /**
     * Display the specified resource.
     * GET /comentarios/{id}
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
     * GET /comentarios/{id}/edit
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
     * PUT /comentarios/{id}
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
     * DELETE /comentarios/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}