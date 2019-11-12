<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255);
			$table->string('password', 255);
			$table->string('phone', 11);
			$table->string('email', 255);
			$table->date('date_of_birth');
			$table->date('last_donation_date');
			$table->string('pin_code')->nullable();
			$table->integer('blood_type_id');
			$table->integer('city_id');
			$table->string('api_token', 60)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}