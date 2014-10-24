<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 22/10/14
 * Time: 10:20 PM
 */

namespace Cartelera\Modulo;


use Cartelera\Base\BaseManagers;

class ModuloManager extends BaseManagers
{
    public function getRules()
    {
        $rules = [
            'modulo' => 'required|min:3|max:30',
            'url' => 'required|min:1|max:20',
            'modulo_padre' => 'required|numeric|min:1|max:100'
        ];

        return $rules;
    }
} 