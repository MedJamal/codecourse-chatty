<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
	public function up()
	{
		Schema::create('statuses', function(Blueprint $table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('parent_id')->nullable();
			$table->text('body');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('statuses');
	}
}
