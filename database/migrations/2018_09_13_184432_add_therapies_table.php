<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTherapiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapies', function (Blueprint $table) {
         $table->increments('therapy_id');
     
    $table->string('therapy_description',100);
       
     
       $table->float('therapy_total_duration');
   
      $table->string('therapy_observation',500);
  
    $table->integer('therapy_sequence');
       
     $table->boolean('therapy_achieved_the_goal');

 
      $table->integer('therapist_id')->unsigned();
        
    $table->integer('patient_id')->unsigned();
       
     $table->integer('institution_id')->unsigned();
    
    
        $table->timestamps();

    
        $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');

      
      $table->foreign('therapist_id')->references('therapist_id')->on('therapists')->onDelete('cascade');
       
     
 $table->foreign('institution_id')->references('institution_id')->on('institutions')->onDelete('cascade');





   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapies');
    }
}
