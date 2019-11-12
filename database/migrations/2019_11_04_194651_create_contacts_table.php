<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 255);
			$table->string('phone', 11);
			$table->string('email', 255);
			$table->text('message');
			$table->integer('client_id');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}