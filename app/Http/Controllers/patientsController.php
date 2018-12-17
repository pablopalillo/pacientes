<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;

class patientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patients = Patient::All()->toArray();

        return response()->json($patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          try{ 
       $patients = Patient::create([
        'patient_id'=>request( 'patient_id'),
        'patient_first_name'=>request( 'patient_first_name'),
        'patient_second_name'=>request( 'patient_second_name'),
        'patient_first_lastname'=>request( 'patient_first_lastname'),
        'patient_second_lastname'=>request( 'patient_second_lastname'),
        'patient_document'=>request('patient_document'),
        'patient_age'=>request( 'patient_age'),
        'patient_address'=>request( 'patient_address'),
        'patient_mobile_number'=>request( 'patient_mobile_number'),
        'patient_landline_phone'=>request( 'patient_landline_phone'),
        'patient_additional_data'=>request( 'patient_additional_data'),
        'neighborhood_id'=>request( 'neighborhood_id'),
        'document_type_id'=>request( 'document_type_id'),
        'gender_id'=>request( 'gender_id')
    ]);

        return response()->json($patients, 201);
        
        }catch(Exception $e)
        {
        return response()->json(['Error: '.$e], 204);
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $patient = Patient::find($id);

    if(!$patient){
     return response()->json(['No existe',404]);   
    }

     return response()->json($patient,200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $patient_id= request( 'patient_id');
        $patient_first_name=request('patient_first_name');
        $patient_second_name=request( 'patient_second_name');
        $patient_first_lastname=request( 'patient_first_lastname');
        $patient_second_lastname=request( 'patient_second_lastname');
        $patient_document=request('patient_document');
        $patient_age=request( 'patient_age');
        $patient_address=request( 'patient_address');
        $patient_mobile_number=request( 'patient_mobile_number');
        $patient_landline_phone=request( 'patient_landline_phone');
        $patient_additional_data=request( 'patient_additional_data');
        $neighborhood_id=request('neighborhood_id');
        $document_type_id=request( 'document_type_id');
        $gender_id=request('gender_id');
    

         try{
        $patient= Patient::find($id);
             if(!$patient){
                return response()->json(['No existe',404]);   
            }
     

        $patient->patient_first_name = $patient_first_name? $patient_first_name : $patient->patient_first_name;
        
        
        $patient->patient_second_name = $patient_second_name? $patient_second_name : $patient->patient_second_name;
        
        $patient->patient_first_lastname = $patient_first_lastname? $patient_first_lastname : $patient->patient_first_lastname;
        
        $patient->patient_second_lastname = $patient_second_lastname? $patient_second_lastname : $patient->patient_second_lastname;
        
        $patient->patient_document = $patient_document? $patient_document : $patient->patient_document;
        
        
        $patient->patient_age = $patient_age? $patient_age : $patient->patient_age;
        
        $patient->patient_address = $patient_address? $patient_address : $patient->patient_address;
        
        $patient->patient_mobile_number = $patient_mobile_number? $patient_mobile_number : $patient->patient_mobile_number;
        
        $patient->patient_landline_phone = $patient_landline_phone? $patient_landline_phone : $patient->patient_landline_phone;
        
     
        $patient->patient_additional_data = $patient_additional_data? $patient_additional_data : $patient->patient_additional_data;
        
        $patient->neighborhood_id = $neighborhood_id? $neighborhood_id : $patient->neighborhood_id;
        
        $patient->document_type_id = $document_type_id? $document_type_id : $patient->document_type_id;
        
        $patient->gender_id = $gender_id? $gender_id : $patient->gender_id;
        

        $patient->save();
        return response()->json($patient,200);
        
        }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }    


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               try{
        $patient= Patient::find($id);
             if(!$patient){
                return response()->json(['No existe',404]); 
        }
             $patient->delete();
      
        return response()->json($patient,200);

                }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }
    }
}
