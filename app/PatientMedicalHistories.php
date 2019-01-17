<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedicalHistories extends Model
{
    protected $table = 'patient_medical_histories';

    protected $fillable = ['ptn_mdcl_hstry_id','patient_id','ptnt_mdcl_hstry_addtnl_info'];

    protected $hidden = ['created_at','updated_at'];

}
