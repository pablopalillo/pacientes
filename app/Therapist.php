<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    protected $table = 'therapists';


	protected $primaryKey ='therapist_id';
	
    protected $fillable = [
    	'therapist_id',
    	'therapist_first_name',
    	'therapist_second_name',
    	'therapist_first_lastname',
    	'therapist_second_lastname',
    	'therapist_age',
    	'gender_id',
    	'document_type_id',
    	'neighborhood_id'
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
