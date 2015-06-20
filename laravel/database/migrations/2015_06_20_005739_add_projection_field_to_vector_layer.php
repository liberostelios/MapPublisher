<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectionFieldToVectorLayer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('layers', function(Blueprint $table)
		{
			$table->string('projection');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tile_layers', function(Blueprint $table)
		{
			$table->dropColumn('projection');
		});
	}

}
