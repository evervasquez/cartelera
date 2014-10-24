<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignSeguridad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->foreign('idperfil')->references('id')->on('perfiles');
        });

        Schema::table('permisos',function(Blueprint $table)
        {
            $table->foreign('idperfil')->references('id')->on('perfiles');
            $table->foreign('idmodulo')->references('id')->on('modulos');
        });

        Schema::table('modulos',function(Blueprint $tabla)
        {
            $tabla->foreign('idpadre')->references('id')->on('modulos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users',function(Blueprint $table)
        {
            $table->dropForeign('users_idperfil_foreign');
        });

        Schema::table('permisos',function(Blueprint $table)
        {
            $table->dropForeign('permisos_idperfil_foreign');
            $table->dropForeign('permisos_idmodulo_foreign');
        });

        Schema::table('modulos',function(Blueprint $tabla)
        {
            $tabla->dropForeign('modulos_idpadre_foreign');
        });
	}

}
