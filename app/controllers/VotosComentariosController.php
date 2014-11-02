<?php
use Cartelera\VotosComentarios\VotosComentarioRepo;

class VotosComentariosController extends \BaseController
{
    protected $votocomentarioRepo;

    public function __construct(VotosComentarioRepo $votosComentarioRepo)
    {
        $this->votocomentarioRepo = $votosComentarioRepo;
    }

    /**
     * Display a listing of the resource.
     * GET /votoscomentarios
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /votoscomentarios/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /votoscomentarios
     *
     * @return Response
     */
    public function store()
    {
        $datos = Input::all();
        $response = $this->votocomentarioRepo->saveMegusta($datos);
        return $response;
    }

    /**
     * Display the specified resource.
     * GET /votoscomentarios/{id}
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
     * GET /votoscomentarios/{id}/edit
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
     * PUT /votoscomentarios/{id}
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
     * DELETE /votoscomentarios/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}