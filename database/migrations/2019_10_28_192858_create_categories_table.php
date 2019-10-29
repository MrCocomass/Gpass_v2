<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('id_password')->unsigned();
            $table->timestamps();
        });

        $category = new App\Category();
        $category->name = 'GitHub';
        $category->id_password = empty(null);
        $category->save();

    }

    public function down()
    {
        // Schema::dropIfExists('categories');
        Schema::table('categories', function($table) {
            $table->foreign('id_password')->references('id')->on('password');
       
        }); 
    }
}
