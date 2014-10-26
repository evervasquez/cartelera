<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComunicadosTable extends Migration {

	public function up()
	{
		Schema::create('comunicados', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('tipocomunicado_id')->unsigned();
            $table->integer('posicion_id')->unsigned();
            $table->string('CodigoCurso');
            $table->text('titulo');
            $table->text('comunicado');
            $table->dateTime('fechahora_inicio');
            $table->dateTime('fechahora_fin');
            $table->string('urlimagen')->nullable();
            $table->string('urlarchivo')->nullable();
            $table->tinyInteger('totalmegusta')->default(0);
            $table->tinyInteger('totalnomegusta')->default(0);
            $table->integer('cant_visto')->default(0);
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
		Schema::drop('comunicados');
	}

}
