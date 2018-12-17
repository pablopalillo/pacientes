<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
 
 protected $table = 'departments';

	protected $primaryKey ='department_id';


    protected $fillable = ['department_id','department_name','department_description'];

   protected $hidden =['created_at','updated_at'];

   public function Cities()
   {
   		return $this->hasMany('App\Department');
   }


}
