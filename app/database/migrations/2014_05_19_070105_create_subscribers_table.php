<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscribers', function($table)
		{
			$table->increments('id'); 
			$table->string('name');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->integer('postcode')->nullable()->default(NULL);
			$table->string('country');
			$table->string('email');
			$table->integer('phone');
			$table->string('position')->nullable()->default(NULL);
			$table->string('department')->nullable()->default(NULL);
			$table->string('organization')->nullable()->default(NULL);
			$table->boolean('active')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
