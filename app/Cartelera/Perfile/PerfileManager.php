<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 23/10/14
 * Time: 12:26 PM
 */

namespace Cartelera\Perfile;


use Cartelera\Base\BaseManagers;

class PerfileManager extends BaseManagers
{
    public function getRules()
    {
        $rules = [
            'Perfile' => 'required|alpha_dash|min:3|max:30'
        ];

        return $rules;
    }
} 