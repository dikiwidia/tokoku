<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodeTable extends Migration {

	public function up()
	{
		Schema::create('periode', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->enum('active', array('N', 'Y'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('periode');
	}
}