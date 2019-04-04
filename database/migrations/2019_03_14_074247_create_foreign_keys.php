<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('product', function(Blueprint $table) {
			$table->foreign('measure_id')->references('id')->on('measure')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('product')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('warehouse_id')->references('id')->on('warehouse')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('periode_id')->references('id')->on('periode')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('product', function(Blueprint $table) {
			$table->dropForeign('product_measure_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_product_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_warehouse_id_foreign');
		});
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_periode_id_foreign');
		});
	}
}