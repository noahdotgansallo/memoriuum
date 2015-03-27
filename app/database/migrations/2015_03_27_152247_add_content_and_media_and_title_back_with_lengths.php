<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentAndMediaAndTitleBackWithLengths extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('memory', function($table){
			$table->string('content', 1000000);
			$table->string('title', 3000);
			$table->string('media', 10000);
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
			$table->dropColumn('content');
			$table->dropColumn('title');
			$table->dropColumn('media');
		});
	}

}
