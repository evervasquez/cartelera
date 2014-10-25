<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 08:37 AM
 */

class PerfilesTableSeeder extends Seeder{
    public function run()
    {
        $carbon = \Carbon\Carbon::now();
        DB::table('perfiles')->insert(array(
            'descripcion' => 'ADMINISTRADOR',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
    }
} 