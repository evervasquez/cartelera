<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('modulos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('idpadre')->unsigned()->nullable();
            $table->string('descripcion', 45);
            $table->string('url', 200);
            $table->string('icono')->default('im-arrow-right3');
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
