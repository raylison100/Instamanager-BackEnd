<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateInstaContasTable.
 */
class CreateInstagramAccountTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instagram_Account', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();
            $table->string('password');
            $table->integer('likes');
            $table->integer('followers');
            $table->integer('comments');
            $table->string('apiKey');
            $table->string('apiSecret');
            $table->string('apiCallback');
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
		Schema::drop('instagram_Account');
	}
}
