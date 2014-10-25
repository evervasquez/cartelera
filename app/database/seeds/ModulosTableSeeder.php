<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 08:37 AM
 */

class ModulosTableSeeder extends Seeder{
    public function run()
    {
        $carbon = \Carbon\Carbon::now();
        DB::table('modulos')->insert(array(
            'descripcion' => 'PADRE',
            'url' => '#',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
        DB::table('modulos')->insert(array(
            'descripcion' => 'Mantenimiento',
            'idpadre' => 1,
            'url' => '#',
            'icono' => 'im-paste',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
        DB::table('modulos')->insert(array(
            'descripcion' => 'Facultades',
            'idpadre' => 2,
            'url' => 'facultades',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));

        DB::table('modulos')->insert(array(
            'descripcion' => 'Seguridad',
            'idpadre' => 1,
            'url' => '#',
            'icono' => 'im-shield4',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
        DB::table('modulos')->insert(array(
            'descripcion' => 'Modulos',
            'idpadre' => 4,
            'url' => 'modulos',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
        DB::table('modulos')->insert(array(
            'descripcion' => 'Permisos',
            'idpadre' => 4,
            'url' => 'permisos',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
    }
} 