<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhysiologicalParametersTherapyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiological_parameters_therapy', function (Blueprint $table) {
            $table->increments('physio_param_thrpy_id');

      

        $table->integer('physio_param_id')->unsigned();
    
 
     
        $table->integer('therapy_id')->unsigned();
     
   
    
        $table->string('physio_param_thrpy_value',10);
    
 
 
       $table->string('physio_param_thrpy_in_out',3);


      
   
   
     $table->timestamps();



          
 
      
  $table->foreign('therapy_id')->references('therapy_id')->on('therapies')->onDelete('cascade');


 
  
     $table->foreign('physio_param_id')->references('physiological_parameter_id')->on('physiological_parameters')->onDelete('cascade');

 
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physiological_parameters_therapy');
    }
}
