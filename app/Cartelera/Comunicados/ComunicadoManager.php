<?php

namespace Cartelera\Comunicados;


use Cartelera\Base\BaseManagers;

class ComunicadoManager extends BaseManagers
{
    public function getRules()
    {
        $rules = [
            'posicion' => 'require|integer|min:1|max:2|',
            'tipo' => 'require|integer|min:1|max:2|',
            'fechainicio' => 'required|date_format:d-m-Y H:i:s',
            'fechafin' => 'required|date_format:d-m-Y H:i:s|after:fechainicio',
            'titulo' => 'required|alpha_dash',
            'comunicado' => 'required'
        ];

        return $rules;
    }

} 