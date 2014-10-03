<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 200)->unique();
			$table->string('slug', 400)->unique();
			$table->boolean('draft');
			$table->text('body');
			$table->string('meta_title', 65)->unique()->default('');
			$table->string('meta_description', 156)->unique()->default('');
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
		Schema::drop('pages');
	}

}
