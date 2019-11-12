<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('about_app');
			$table->string('phone', 11);
			$table->string('email', 255);
			$table->string('facebook_link');
			$table->string('twitter_link');
			$table->string('youtube_link');
			$table->string('play_store_link');
			$table->string('app_store_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}