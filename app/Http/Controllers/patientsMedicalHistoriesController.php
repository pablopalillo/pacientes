<?php

namespace App\Http\Controllers;
use App\PatientMedicalHistories;

use Illuminate\Http\Request;

class patientsMedicalHistoriesController extends Controller {


    public function index() 
    {
        $histories = PatientMedicalHistories::get()->toArray();

        return response()->json($histories);
    }
}