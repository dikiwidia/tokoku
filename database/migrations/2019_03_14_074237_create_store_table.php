<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreTable extends Migration {

	public function up()
	{
		Schema::create('store', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('address', 100);
			$table->string('email')->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('logo')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('store');
	}
}