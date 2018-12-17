<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gender;


class gendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $genders = Gender::all()->toArray();

     return response()->json($genders);   
  
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
       $genders = Gender::create([
        'gender_description'=>request('gender_description'),
        'gender_name'=>request('gender_name')
    ]);

        return response()->json($genders, 201);
        
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
        $gender = Gender::find($id);

    if(!$gender){
     return response()->json(['No existe',404]);   
    }

     return response()->json($gender,200);
 
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
    $gender_description=request('gender_description');
    $gender_name=request('gender_name');
    
        
        try{
        $gender= Gender::find($id);
             if(!$gender){
                return response()->json(['No existe',404]);   
            }
     

        $gender->gender_description = $gender_description? $gender_description : $gender->gender_description;

        $gender->gender_name = $gender_name? $gender_name : $gender->gender_name;


        $gender->save();
        return response()->json($gender,200);
        
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
        $gender= Gender::find($id);
             if(!$gender){
                return response()->json(['No existe',404]); 
        }
             $gender->delete();
      
        return response()->json($gender,200);

                }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }

    }
}
