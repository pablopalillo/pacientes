<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
   
    protected $table = 'neighborhoods';


	protected $primaryKey ='neighborhood_id';
	
    protected $fillable = ['neighborhood_id','	neighborhood_description','neighborhood_name','city_id'];

    protected $hidden =['created_at','updated_at'];

	public function City()
	{
		return $this->belongsTo('App\City');
	}

		public function Patiens()
	{
		return $this->hasMany('App\Patient');
	}

	public function Therapists()
	{
		return $this->hasMany('App\Therapist');
	}

}
