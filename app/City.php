<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';


	protected $primaryKey ='city_id';
	
    protected $fillable = ['city_id','city_description','department_id'];

    protected $hidden =['created_at','updated_at'];

	public function Department()
	{
		return $this->belongsTo('App\Department');
	}

	public function Neighborhoods()
   {
   		return $this->hasMany('App\Neighborhood');
   }


}
