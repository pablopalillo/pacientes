<?php

namespace App\Http\Controllers;
use App\PatientMedicalHistories;
use App\Patient_medical_history_disease;

use Illuminate\Http\Request;

class patientsMedicalHistoriesController extends Controller {


    public function index() 
    {
        $histories = PatientMedicalHistories::get()->toArray();
        return response()->json($histories);
    }


    /**
     *  Busca la historia especifica filtrada por usuario
     * 
     */

    public function show($id) 
    {
        if(!empty($id)) {

            $history = PatientMedicalHistories::find($id)->first();

            if(!$history) {
                return null;
            }

            return response()->json($history, 200);
        }
    }


    public function store(Request $request)
    {
        try {

            $history = PatientMedicalHistories::create([
                'patient_id' => request('patient_id'),
                'ptnt_mdcl_hstry_addtnl_info' => request('ptnt_mdcl_hstry_addtnl_info')
            ]);

            return response()->json($history, 200);

        } catch(Exception $e) {
            return response()->json(['Error: '.$e], 500);
        }
    }

}