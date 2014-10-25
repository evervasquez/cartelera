<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 25/10/14
 * Time: 08:37 AM
 */

class PermisosTableSeeder extends Seeder{
    public function run()
    {
        $carbon = \Carbon\Carbon::now();
        DB::table('permisos')->insert(array(
            'idperfil' => 1,
            'idmodulo' => 3,
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
        DB::table('permisos')->insert(array(
            'idperfil' => 1,
            'idmodulo' => 5,
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));
    }
} 