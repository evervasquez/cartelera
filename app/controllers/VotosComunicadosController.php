<?php
use Cartelera\VotosComunicados\VotosComunicadoRepo;

class VotosComunicadosController extends \BaseController
{
    protected $votosComuniadoRepo;

    public function __construct(VotosComunicadoRepo $votosComunicadoRepo)
    {
        $this->votosComuniadoRepo = $votosComunicadoRepo;
    }

    /**
     * Display a listing of the resource.
     * GET /votoscomunicados
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /votoscomunicados/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /votoscomunicados
     *
     * @return Response
     */
    public function store()
    {
            $datos = Input::all();
            return $this->votosComuniadoRepo->saveVisto($datos);
    }

    /**
     * Display the specified resource.
     * GET /votoscomunicados/{id}
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
     * GET /votoscomunicados/{id}/edit
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
     * PUT /votoscomunicados/{id}
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
     * DELETE /votoscomunicados/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}