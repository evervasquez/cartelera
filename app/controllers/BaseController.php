<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function baseEditar($repositorio, $manager,$datos)
    {
        $response=null;
        if($manager->isValid())
        {
            $repositorio->editar($datos);
            return \Response::json(array(
                    "Result" => "OK"
                )
            );
        }else{
            return \Response::json(array(
                    "Result" => "ERROR",
                    "Message" => $manager->getErros()
                )
            );
        }
    }

    protected function baseNuevo($repositorio, $manager, $datos)
    {
        $response=null;
        if($manager->isValid())
        {
            $response = $repositorio->nuevo($datos);
            return \Response::json(array(
                    "Result" => "OK",
                    "Record" => $response
                )
            );
        }else{
            return \Response::json(array(
                    "Result" => "ERROR",
                    "Message" => $manager->getErros()
                )
            );
        }
    }

}
