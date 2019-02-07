<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_medical_history_disease extends Model
{
    protected $table = 'patient_medical_history_diseases';
    protected $primaryKey = "ptnt_mdcl_hstry_id";
    
    protected $fillable = [
        'disease_id',
        'ptnt_mdcl_hstry_id',
        'patient_disease_is_base',
    ];

    protected $hidden = ['created_at','updated_at'];

}
