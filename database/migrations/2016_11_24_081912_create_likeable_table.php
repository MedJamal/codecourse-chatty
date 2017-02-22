<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeableTable extends Migration
{
	public function up()
	{
		Schema::create('likeable', function(Blueprint $table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('likeable_id');
			$table->string('likeable_type');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('likeable');
	}
}
