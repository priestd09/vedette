<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserGovernorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('user_governors', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('user_id')->index();

			$table->string('ip_address')->nullable();

			$table->smallInteger('attempts', 1)->nullable();
			$table->smallInteger('suspended', 1)->nullable();
			$table->smallInteger('banned', 1)->nullable();

			$table->timestamp('last_attempt_at');
			$table->timestamp('suspended_at');
			$table->timestamp('banned_at');

			$table->softDeletes();
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
		Schema::drop('user_governors');
	}

}