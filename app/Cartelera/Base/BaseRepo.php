<?php

namespace Cartelera\Base;


use Carbon\Carbon;

class BaseRepo
{

    public function getCreatedAt()
    {
        $carbon = Carbon::now();
        return $carbon->toDateTimeString();
    }

    public function getUpdateAt()
    {
        $carbon = Carbon::now();
        return $carbon->toDateTimeString();
    }

    public function getDeletedAt()
    {
        $carbon = Carbon::now();
        return $carbon->toDateTimeString();
    }

    public function getMaxSemestre()
    {
        $semestre = \DB::table('semestreacademico as s')
                    ->join('matricula as a','s.CodigoSemestre','=','a.CodigoSemestre')
                    ->max('s.CodigoSemestre');
        return $semestre;
    }
}