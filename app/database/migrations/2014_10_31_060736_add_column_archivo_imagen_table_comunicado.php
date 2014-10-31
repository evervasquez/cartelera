<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnArchivoImagenTableComunicado extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comunicados',function(Blueprint $table)
        {   $table->dropColumn('urlarchivo');
            $table->dropColumn('urlimagen');
            $table->text('urlarchivo1')->nullable();
            $table->text('urlarchivo2')->nullable();
            $table->text('urlimagen1')->nullable();
            $table->text('urlimagen2')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('comunicados',function(Blueprint $table)

        {
            $table->dropColumn('urlarchivo1');
            $table->dropColumn('urlarchivo2');
            $table->dropColumn('urlimagen1');
            $table->dropColumn('urlimagen2');
            $table->text('urlarchivo')->nullable();
            $table->text('urlimagen')->nullable();

        });
	}

}
