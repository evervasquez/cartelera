<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->integer('idperfil')->unsigned();
            $table->string('idfacultad',2)->nullable();
            $table->string('idescuela',4)->nullable();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('usuario', 45);
            $table->text('password');
            $table->text('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('modulos');
    }

}
