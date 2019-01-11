<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateInstaContasTable.
 */
class CreateInstaContasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insta_contas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('password');
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
		Schema::drop('insta_contas');
	}
}