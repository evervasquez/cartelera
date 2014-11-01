<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 01/11/14
 * Time: 02:05 PM
 */

namespace Cartelera\Comentarios;


use Cartelera\Base\BaseManagers;

class ComentarioManager extends BaseManagers{

    public function getRules()
    {
        $rules = [
            'id' => 'require|integer|min:1',
            'comentario' => 'require|alpha_dash'
        ];

        return $rules;
    }

}