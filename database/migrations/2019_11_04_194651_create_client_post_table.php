<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientPostTable extends Migration {

	public function up()
	{
		Schema::create('client_post', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('post_id');
			$table->integer('client_id');
			$table->tinyInteger('toggle_favourite')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('client_post');
	}
}
