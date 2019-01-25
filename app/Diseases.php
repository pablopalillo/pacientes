<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    protected $table = 'diseases';
	protected $primaryKey ='disease_id';


    protected $fillable = ['disease_id','disease_name','disease_description'];
    protected $hidden =['created_at','updated_at'];

    

}
