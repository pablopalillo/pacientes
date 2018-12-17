<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNeighborhoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighborhoods', function (Blueprint $table) {
            
     $table->increments('neighborhood_id');       
     $table->string('neighborhood_description', 30);
     $table->string('neighborhood_name', 20);
     $table->integer('city_id')->unsigned();
     $table->timestamps();       
     $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
     

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neighborhoods');
    }
}
