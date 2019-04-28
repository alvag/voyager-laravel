<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_category_id')->unsigned();
			$table->string('name', 200);
			$table->float('price', 10, 0);
			$table->string('color', 100)->nullable();
			$table->string('size', 50)->nullable();
			$table->text('description', 65535);
			$table->text('other_details', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('slug')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
