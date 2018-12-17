<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';


	protected $primaryKey ='patient_id';
	
    protected $fillable = [
    	'patient_id',
    	'patient_first_name',
    	'patient_second_name',
    	'patient_first_lastname',
    	'patient_second_lastname',
    	'patient_document',
    	'patient_age',
    	'patient_address',
    	'patient_mobile_number',
    	'patient_landline_phone',
    	'patient_additional_data',
    	'neighborhood_id',
    	'document_type_id',
    	'gender_id'
    ];

    protected $hidden =['created_at','updated_at'];

    public function Neighborhood()
    {
     return $this->belongsTo('App\Neighborhood');
    }


    public function DocumentType()
    {
     return $this->belongsTo('App\DocumentType');
    }



    public function Gender()
    {
     return $this->belongsTo('App\Gender');
    }


}
