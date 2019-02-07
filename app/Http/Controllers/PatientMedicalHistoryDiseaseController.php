<?php

namespace App\Http\Controllers;
use App\Patient_medical_history_disease;

use Illuminate\Http\Request;

class PatientMedicalHistoryDiseaseController extends Controller {


    public function index() 
    {
        $historyDisease = Patient_medical_history_disease::get()->toArray();
        return response()->json($historyDisease);
    }


    public function store(Request $request)
    {
        try {

            $historyDisease = Patient_medical_history_disease::create([
                'ptnt_mdcl_hstry_id' => request('ptnt_mdcl_hstry_id'),
                'disease_id' => request('disease_id'),
                'patient_disease_is_base' => request('patient_disease_is_base')
            ]);

            return response()->json($historyDisease, 200);

        } catch(Exception $e) {
            return response()->json(['Error: '.$e], 500);
        }
    }


    public function destroy($id)
    {
        try{

            $historyDisease = Patient_medical_history_disease::find($id);

            if(!$historyDisease){
                return response()->json(['No existe',404]); 
            }

            $historyDisease->delete();



            return response()->json($historyDisease,200);

        }catch(Exception $e){
            return response()->json(['Error: '.$e], 500);
        }
    }

}