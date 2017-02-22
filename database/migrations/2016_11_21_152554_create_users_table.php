<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function(Blueprint $table){
			$table->increments('id');
			$table->string('email', 70);
			$table->string('username', 40);
			$table->char('password', 60);
			$table->string('firstname', 40)->nullable();
			$table->string('lastname', 40)->nullable();
			$table->string('location')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
