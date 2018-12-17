<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientMedicalHistoryDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_history_diseases', function (Blueprint $table) {
            $table->increments('ptnt_mdcl_hstry_disease_id');
     
       $table->integer('disease_id')->unsigned();
   
     
    $table->integer('ptnt_mdcl_hstry_id')->unsigned();
   
         $table->boolean('patient_disease_is_base');
    
        

        $table->timestamps();



          
  $table->foreign('disease_id')->references('disease_id')->on('diseases')->onDelete('cascade');

   
 
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
        Schema::dropIfExists('patient_medical_history_diseases');
    }
}
