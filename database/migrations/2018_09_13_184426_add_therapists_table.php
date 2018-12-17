<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTherapistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
       $table->increments('therapist_id');
     
       $table->string('therapist_first_name',50);
     
       $table->string('therapist_second_name',50);
        
       $table->string('therapist_first_lastname',50);
    
       $table->string('therapist_second_lastname',50);
     
       $table->integer('therapist_age');
    
       $table->integer('gender_id')->unsigned();
  
       $table->integer('document_type_id')->unsigned();
   
       $table->integer('neighborhood_id')->unsigned();

         $table->timestamps();
  
      
      $table->foreign('document_type_id')->references('document_type_id')->on('document_types')->onDelete('cascade');

       
     $table->foreign('gender_id')->references('gender_id')->on('genders')->onDelete('cascade');
     
   $table->foreign('neighborhood_id')->references('neighborhood_id')->on('neighborhoods')->onDelete('cascade');

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapists');
    }
}
