<?php
use Cartelera\Comunicados\ComunicadoRepo;
use Cartelera\Comunicados\ComunicadoManager;
class ComunicadosController extends \BaseController
{
    protected $comunicadoRepo;

    public function __construct(ComunicadoRepo $comunicadoRepo)
    {
        $this->comunicadoRepo = $comunicadoRepo;
    }

    /**
     * Display a listing of the resource.
     * GET /comunicados
     *
     * @return Response
     */
    public function index()
    {
        return $this->comunicadoRepo->selectAll();
    }

    /**
     * Show the form for creating a new resource.
     * GET /comunicados/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /comunicados
     *
     * @return Response
     */
    public function store()
    {
        $datos = Input::all();
        $manager = new ComunicadoManager($datos);
        $response = $this->baseNuevo($this->comunicadoRepo,$manager,$datos);
        return $response;
    }

    /**
     * Display the specified resource.
     * GET /comunicados/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->comunicadoRepo->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /comunicados/{id}/edit
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
     * PUT /comunicados/{id}
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
     * DELETE /comunicados/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}