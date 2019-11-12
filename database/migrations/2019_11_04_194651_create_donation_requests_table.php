<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name', 255);
			$table->integer('age');
			$table->integer('bags_number');
			$table->string('hospital_name', 255);
			$table->string('hospital_address', 255);
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->string('phone', 11);
			$table->text('notes');
			$table->integer('blood_type_id');
			$table->integer('city_id');
			$table->integer('client_id');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}