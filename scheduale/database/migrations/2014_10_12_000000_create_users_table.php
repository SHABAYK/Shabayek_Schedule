<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            /*$table->integer('user_type_id')->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');*/
            $table->string('username');
            $table->string('email')->unique();
            $table->enum('type',['admin','academic','manager']);
            $table->string('password');
            $table->integer('mobile');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
