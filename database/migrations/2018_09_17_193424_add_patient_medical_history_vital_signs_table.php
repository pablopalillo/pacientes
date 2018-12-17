<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientMedicalHistoryVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_history_vital_signs', function (Blueprint $table) {
                $table->increments('patient_vital_signs_id');

  
  
            $table->string('patient_vital_signs_value', 20);

     
    
            $table->integer('ptnt_mdcl_hstry_id')->unsigned();
    

       
            $table->integer('vital_sign_id')->unsigned();
    
        
     
            $table->timestamps();


        
    $table->foreign('ptnt_mdcl_hstry_id')->references('ptnt_mdcl_hstry_id')->on('patient_medical_histories')->onDelete('cascade');

 
      
      $table->foreign('vital_sign_id')->references('vital_sign_id')->on('vital_signs')->onDelete('cascade');

  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medical_history_vital_signs');
    }
}
