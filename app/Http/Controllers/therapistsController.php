<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Therapist;

class therapistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $therapists = Therapist::All()->toArray();

        return response()->json($therapists);
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
     $therapists = Therapist::create([
        'therapist_first_name'=>request( 'therapist_first_name'),
        'therapist_second_name'=>request( 'therapist_second_name'),
        'therapist_first_lastname'=>request( 'therapist_first_lastname'),
        'therapist_second_lastname'=>request( 'therapist_second_lastname'),
        'therapist_age'=>request('therapist_age'),
        'gender_id'=>request( 'gender_id'),
        'document_type_id'=>request( 'document_type_id'),
        'neighborhood_id'=>request( 'neighborhood_id')
    ]);
    
        return response()->json($therapists, 201);
        
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
         $therapist = Therapist::find($id);

    if(!$therapist){
     return response()->json(['No existe',404]);   
    }

     return response()->json($therapist,200);
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
     

         $therapist_first_name=request( 'therapist_first_name');
         $therapist_second_name=request( 'therapist_second_name');
         $therapist_first_lastname=request( 'therapist_first_lastname');
         $therapist_second_lastname=request( 'therapist_second_lastname');
         $therapist_age=request('therapist_age');
         $gender_id=request( 'gender_id');
         $document_type_id=request( 'document_type_id');
         $neighborhood_id=request( 'neighborhood_id');



    
        
        try{
        $therapist= Therapist::find($id);
             if(!$therapist){
                return response()->json(['No existe',404]);   
            }

           $therapist->therapist_first_name = $therapist_first_name? $therapist_first_name : $therapist->therapist_first_name;
           $therapist->therapist_second_name = $therapist_second_name? $therapist_second_name : $therapist->therapist_second_name;
           $therapist->therapist_first_lastname = $therapist_first_lastname? $therapist_first_lastname : $therapist->therapist_first_lastname;
           $therapist->therapist_second_lastname = $therapist_second_lastname? $therapist_second_lastname : $therapist->therapist_second_lastname;
           $therapist->therapist_age = $therapist_age? $therapist_age : $therapist->therapist_age;
           $therapist->gender_id = $gender_id? $gender_id : $therapist->gender_id;
           $therapist->document_type_id = $document_type_id? $document_type_id : $therapist->document_type_id;
           $therapist->neighborhood_id = $neighborhood_id? $neighborhood_id : $therapist->neighborhood_id;

        $therapist->save();
        return response()->json($therapist,200);
        
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
        $therapist= Therapist::find($id);
             if(!$therapist){
                return response()->json(['No existe',404]); 
        }
             $therapist->delete();
      
        return response()->json($therapist,200);

                }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }

    }
}
