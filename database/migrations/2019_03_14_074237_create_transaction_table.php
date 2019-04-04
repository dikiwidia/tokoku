<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionTable extends Migration {

	public function up()
	{
		Schema::create('transaction', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->date('date');
			$table->bigInteger('price');
			$table->integer('qty');
			$table->enum('type', array('S', 'B', 'SO'));
			$table->integer('warehouse_id')->unsigned()->nullable();
			$table->integer('periode_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('transaction');
	}
}