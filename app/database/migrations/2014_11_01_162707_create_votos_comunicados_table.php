<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVotosComunicadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('votos_comunicados', function(Blueprint $table)
		{
			$table->integer('visto')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('votos_comunicados', function(Blueprint $table)
        {
            $table->dropColumn('visto');
        });
	}

}
