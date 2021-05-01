<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('qty');
            $table->bigInteger('brands_id')->unsigned();
            $table->bigInteger('categories_id')->unsigned();
            $table->integer('harga');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('brands_id')->references('id')->on('brands'); 
        $table->foreign('categories_id')->references('id')->on('categories');
        });

         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
