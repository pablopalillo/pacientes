<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhysiologicalParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiological_parameters', function (Blueprint $table) {
           $table->increments('physiological_parameter_id');
            $table->string('physiological_parameter_name',20);

            $table->string('physiological_parameter_description',50);

            $table->timestamps();


     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physiological_parameters');
    }
}
