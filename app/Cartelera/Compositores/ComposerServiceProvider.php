<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 24/10/14
 * Time: 11:34 PM
 */
namespace Cartelera\Compositores;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->view->composer('layout', 'Cartelera\Compositores\MenuListComposer');
    }


} 