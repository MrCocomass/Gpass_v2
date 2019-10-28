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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->integer('id_category')->unsigned();
            $table->timestamps();
        });

        $user = new App\User();
        $user->password = 'admin';
        $user->email = 'danielmirandafer@gmail.com';
        $user->name = 'admin';
        $user->id_category = empty(null);
        $user->save();
    }

    public function down()
    {
        // Schema::dropIfExists('users');
        Schema::table('users', function($table) {
            $table->foreign('id_category')->references('id')->on('category');

        });
    }
}
