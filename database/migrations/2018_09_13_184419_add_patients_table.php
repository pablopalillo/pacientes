<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
         
         $table->increments('patient_id');
         $table->string('patient_first_name',20);
         $table->string('patient_second_name',20);
            
 
           $table->string('patient_first_lastname',20);
            $table->string('patient_second_lastname',20);

   
            $table->string('patient_document',20);
      
      $table->integer('patient_age');
        $table->string('patient_address',50);
          
  $table->string('patient_mobile_number',15);
         
   $table->string('patient_landline_phone',10);
          
  $table->string('patient_additional_data',100);

    $table->integer('neighborhood_id')->unsigned();

         $table->integer('document_type_id')->unsigned();
            
$table->integer('gender_id')->unsigned();
          

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
        Schema::dropIfExists('patients');
    }
}
