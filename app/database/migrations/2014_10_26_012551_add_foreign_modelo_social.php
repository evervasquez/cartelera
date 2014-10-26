<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignModeloSocial extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('comunicados', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipocomunicado_id')->references('id')->on('tipocomunicados');
            $table->foreign('posicion_id')->references('id')->on('posicions');
            $table->foreign('CodigoCurso')->references('CodigoCurso')->on('cursos');
        });

        Schema::table('votos_comunicados', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comunicado_id')->references('id')->on('comunicados');

        });

        Schema::table('comentarios',function(Blueprint $table)
        {
            $table->foreign('comunicado_id')->references('id')->on('comunicados');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('votos_comentarios',function(Blueprint $tabla)
        {
            $tabla->foreign('user_id')->references('id')->on('users');
            $tabla->foreign('comentario_id')->references('id')->on('comentarios');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('votos_comunicados',function(Blueprint $table)
        {
            $table->dropForeign('votos_comunicados_comunicado_id_foreign');
            $table->dropForeign('votos_comunicados_user_id_foreign');

        });

        Schema::table('permisos',function(Blueprint $table)
        {
            $table->dropForeign('comentarios_comunicado_id_foreign');
        });

        Schema::table('votos_comentarios',function(Blueprint $tabla)
        {
            $tabla->dropForeign('votos_comentarios_comentario_id_foreign');
            $tabla->dropForeign('votos_comentarios_user_id_foreign');
        });
	}

}
