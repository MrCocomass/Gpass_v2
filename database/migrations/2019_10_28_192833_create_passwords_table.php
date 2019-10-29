<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordsTable extends Migration
{
    public function up()
    {
        Schema::create('passwords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('password');
            $table->timestamps();
        });

        $password = new App\Password();
        $password->title = 'Blizzard';
        $password->password = 'GqZhNnN#7y3c';
        $password->save();
    }

    public function down()
    {
        Schema::dropIfExists('passwords');
    }
}
