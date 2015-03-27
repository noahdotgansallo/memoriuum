<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropContentAndMediaAndTitle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('memory', function($table){
			$table->dropColumn('content');
			$table->dropColumn('title');
			$table->dropColumn('media');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('memory', function($table){
			$table->string('content');
			$table->string('title');
			$table->string('media');
		});
	}

}
