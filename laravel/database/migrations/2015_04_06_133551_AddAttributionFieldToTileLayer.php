<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributionFieldToTileLayer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tile_layers', function(Blueprint $table)
		{
			$table->string('attribution');
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
			$table->dropColumn('attribution');
		});
	}

}
