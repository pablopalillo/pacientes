<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{

	protected $table = 'institutions';

    protected $fillable = ['institution_id','institution_name','institution_additional_info'];
	
	protected $primaryKey ='institution_id';

     protected $hidden =['created_at','updated_at'];

}
