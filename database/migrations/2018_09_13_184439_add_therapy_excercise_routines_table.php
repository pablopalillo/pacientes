<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTherapyExcerciseRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapy_excercise_routines', function (Blueprint $table) {
               $table->increments('therapy_excercise_routine_id');
     
      
      $table->float('therapy_excercise_routine_intensity');
    
        $table->float('therapy_excercise_routine_duration');
     
       $table->float('therapy_excercise_routine_speed');
        
    $table->string('therapy_excercise_routine_observation',200);


   
         
       $table->integer('therapy_id')->unsigned();
        
    $table->integer('exercise_routine_id')->unsigned();
    
        $table->timestamps();



          
  $table->foreign('therapy_id')->references('therapy_id')->on('therapies')->onDelete('cascade');

   
         $table->foreign('exercise_routine_id')->references('exercise_routine_id')->on('exercise_routines')->onDelete('cascade');


   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapy_excercise_routines');
    }
}
