<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
 
	protected $table = 'genders';

    protected $fillable = ['gender_description','gender_name','gender_id'];
	
	protected $primaryKey ='gender_id';

     protected $hidden =['created_at','updated_at'];

     	public function Patiens()
	{
		return $this->hasMany('App\Patient');
	}

	public function Therapists()
	{
		return $this->hasMany('App\Therapist');
	}

}
