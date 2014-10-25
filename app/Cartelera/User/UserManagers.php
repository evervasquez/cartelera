<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 22/10/14
 * Time: 04:24 PM
 */

namespace Cartelera\User;


use Cartelera\Base\BaseManagers;

class UserManagers extends BaseManagers{

    public function getRules()
    {
        $rules = [
            'nombres' => 'required|alpha_num|min:3|max:50',
            'apellidos' => 'required|alpha_num|min:3|max:50',
            'usuario' => 'required|alpha_num|min:3|max:50',
            'clave' => 'min:3',
            'email' => 'required|email',
            'perfil' => 'required|numeric|min:1|max:50',
            'direccion' => 'required',
            'dni' => 'required|numeric',
            'fecha_nacimiento' => 'required|date_format:"Y-m-d"',
            'telefono' => 'required',
            'sucursal' => 'required|numeric|min:1|max:50'
        ];

        return $rules;
    }
} 