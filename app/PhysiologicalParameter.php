<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysiologicalParameter extends Model
{
    
	protected $table = 'physiological_parameters';

    protected $fillable = ['physiological_parameter_id','physiological_parameter_name','physiological_parameter_description'];
	
	protected $primaryKey ='physiological_parameter_id';

     protected $hidden =['created_at','updated_at'];

}
