<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionnaireOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_options', function (Blueprint $table) {
              $table->increments('questionnaire_option_id');
 
     
   $table->integer('questionnaire_id')->unsigned();
  
   
    
    $table->integer('option_id')->unsigned();
       
     

    
    $table->timestamps();


     
      
   
     $table->foreign('questionnaire_id')->references('questionnaire_id')->on('questionnaires')->onDelete('cascade');

   
 

        $table->foreign('option_id')->references('option_id')->on('options')->onDelete('cascade');
  
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaire_options');
    }
}
