<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 24/10/14
 * Time: 11:26 PM
 */

namespace Cartelera\Compositores;

use Cartelera\Modulo\ModuloRepo;

//clase para cargar los datos al menu
class MenuListComposer
{
    protected $moduloRepo;

    public function __construct(ModuloRepo $moduloRepo)
    {
        $this->moduloRepo = $moduloRepo;
    }

    public function compose($view)
    {
        $modulos = $this->moduloRepo->getModulos();
        $view->with('modulos', $modulos);
    }

} 