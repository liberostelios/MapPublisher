<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLayerStyling extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('layers', function(Blueprint $table)
		{
			$table->string('img_url');
			$table->string('title_field');
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
			$table->dropColumn('img_url');
			$table->dropColumn('title_field');
		});
	}

}
