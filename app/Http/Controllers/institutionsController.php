<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class institutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $institution = Institution::all()->toArray();

     return response()->json($institution);   
  
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
       $institution = Institution::create([
        'institution_name'=>request('institution_name'),
        'institution_additional_info'=>request('institution_additional_info')
    ]);

        return response()->json($institution, 201);
        
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
        $institution = Institution::find($id);

    if(!$institution){
     return response()->json(['No existe',404]);   
    }

     return response()->json($institution,200);
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
        $institution_name=request('institution_name');
    $institution_additional_info=request('institution_additional_info');
    
        
        try{
        $institution= Institution::find($id);
             if(!$institution){
                return response()->json(['No existe',404]);   
            }
     

        $institution->institution_name = $institution_name? $institution_name : $institution->institution_name;

        $institution->institution_additional_info = $institution_additional_info? $institution_additional_info : $institution->institution_additional_info;


        $institution->save();
        return response()->json($institution,200);
        
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
        $institution= Institution::find($id);
             if(!$institution){
                return response()->json(['No existe',404]); 
        }
             $institution->delete();
      
        return response()->json($institution,200);

                }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }
    }
}
