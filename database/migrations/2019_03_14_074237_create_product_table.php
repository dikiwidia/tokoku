<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	public function up()
	{
		Schema::create('product', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('code', 10)->unique();
			$table->integer('measure_id')->unsigned();
			$table->bigInteger('price');
			$table->integer('warn_stock');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product');
	}
}