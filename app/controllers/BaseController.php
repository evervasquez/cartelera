<?php
use Cartelera\Modulo\ModuloRepo;

class BaseController extends Controller
{
    protected function setupLayout()
    {
        if (Auth::check()) {
                return View::make('layout');
        } else {
                return View::make('login');
        }
    }

    protected function baseEditar($repositorio, $manager, $datos)
    {
        $response = null;
        if ($manager->isValid()) {
            $repositorio->update($datos);
            return \Response::json(array(
                    "Result" => "OK"
                )
            );
        } else {
            return \Response::json(array(
                    "Result" => "ERROR",
                    "Message" => $manager->getErros()
                )
            );
        }
    }

    protected function baseNuevo($repositorio, $manager, $datos)
    {
        $response = null;
        if ($manager->isValid()) {
            $response = $repositorio->save($datos);
            return \Response::json(array(
                    "Result" => "OK",
                    "Record" => $response
                )
            );
        } else {
            return \Response::json(array(
                    "Result" => "ERROR",
                    "Message" => $manager->getErros()
                )
            );
        }
    }

}
