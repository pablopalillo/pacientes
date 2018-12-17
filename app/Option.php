<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table='options';

    protected $primaryKey ='option_id';

    protected $fillable=['option_id','option_name','option_description'];

     protected $hidden =['created_at','updated_at'];



   public function Questionnaires()
     {

     	return $this->belongsToMany('App\Questionnaire','Questionnaire_option','questionnaire_id','option_id')->withPivot('questionnaire_option_id','questionnaire_id','option_id');
     }

}
