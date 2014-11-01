<?php

namespace Cartelera\Comunicados;


use Cartelera\Base\BaseManagers;

class ComunicadoManager extends BaseManagers
{
    public function getRules()
    {
        $rules = [
            'posicion' => 'required|integer|min:1|max:2|',
            'tipo' => 'required|integer|min:1|max:2|',
            'fechainicio' => 'required',
            'fechafin' => 'required|after:fechainicio',
            'titulo' => 'required',
            'comunicado' => 'required'
        ];

        return $rules;
    }

} 