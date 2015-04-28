<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('layers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('group');
			$table->string('connection_string');
			$table->string('username', 40);
			$table->string('password', 40);
			$table->string('table_name', 40);
			$table->string('geometry_field_name', 40);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('layers');
	}

}
