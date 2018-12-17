<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire_option extends Model
{
    


    protected $table = 'questionnaire_options';

    protected $fillable = ['questionnaire_option_id','questionnaire_id','option_id'];
	
	protected $primaryKey ='questionnaire_option_id';

     protected $hidden =['created_at','updated_at'];


     
}
