<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_questionnaires', function (Blueprint $table) {
            $table->increments('patient_medical_history_questionnaire_id');
  
    
  
    $table->integer('ptnt_mdcl_hstry_id')->unsigned();
         
 

    $table->integer('questionnaire_option_id')->unsigned();
          

    $table->timestamps();

 
   $table->foreign('questionnaire_option_id')->references('questionnaire_option_id')->on('questionnaire_options')->onDelete('cascade');

  
  $table->foreign('ptnt_mdcl_hstry_id')->references('ptnt_mdcl_hstry_id')->on('patient_medical_histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_questionnaires');
    }
}
