<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
        $carbon = \Carbon\Carbon::now();
        DB::table('users')->insert(array(
            'idperfil' => 1,
            'usuario' => 'admin',
            'password' => Hash::make('123'),
            'idfacultad' => '07',
            'idescuela' => '0701',
            'nombres' => 'admin',
            'apellidos' => 'apellidos',
            'email' => 'pever@unsm.edu.pe',
            'telefono' => '976143808',
            'created_at' => $carbon->toDateTimeString(),
            'updated_at' => $carbon->toDateTimeString()
        ));

    }

}