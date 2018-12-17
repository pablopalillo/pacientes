<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_histories', function (Blueprint $table) {
             $table->increments('ptnt_mdcl_hstry_id');
    
   
  
              $table->integer('patient_id')->unsigned();

    
          
      $table->string('ptnt_mdcl_hstry_addtnl_info',200);
   
      
          $table->timestamps();

              
  $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');

   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medical_histories');
    }
}
