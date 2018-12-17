<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table='document_types';

    protected $primaryKey ='document_type_id';

    protected $fillable=['document_type_id','document_type_name','document_type_description'];

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
