<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
      protected $table = 'questionnaires';

    protected $fillable = ['questionnaire_id','questionnaire_name','questionnaire_description'];
	
	protected $primaryKey ='questionnaire_id';

     protected $hidden =['created_at','updated_at'];


     public function Options()
     {
     	
     	return $this->belongsToMany('App\Option','Questionnaire_option','questionnaire_id','option_id')->withPivot('questionnaire_option_id','questionnaire_id','option_id');

     }

}
