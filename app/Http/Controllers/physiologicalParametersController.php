<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhysiologicalParameter;

class physiologicalParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $physiologicalParameter = PhysiologicalParameter::all()->toArray();

     return response()->json($physiologicalParameter);   
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
        $physiologicalParameter = PhysiologicalParameter::create([
        'physiological_parameter_name'=>request('physiological_parameter_name'),
        'physiological_parameter_description'=>request('physiological_parameter_description')

      ]);

        return response()->json($physiologicalParameter, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
    $physiologicalParameter = PhysiologicalParameter::find($id);

    if(!$physiologicalParameter){
     return response()->json(['No existe',404]);   
    }

     return response()->json($physiologicalParameter,200);
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
       $physiological_parameter_name=request('physiological_parameter_name');
        $physiological_parameter_description=request('physiological_parameter_description');
        
        try{
        $physiologicalParameter= PhysiologicalParameter::find($id);
             if(!$physiologicalParameter){
                return response()->json(['No existe',404]);   
            }
     

        $physiologicalParameter->physiological_parameter_name = $physiological_parameter_name? $physiological_parameter_name : $physiologicalParameter->physiological_parameter_name;
        $physiologicalParameter->physiological_parameter_description = $physiological_parameter_description? $physiological_parameter_description : $physiologicalParameter->physiological_parameter_description;
        
        $physiologicalParameter->save();
        return response()->json($physiologicalParameter,200);
        }catch(ModelNotFoundException $e){
            return response()->json(['Error updating: '.$e], 204);
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
            $physiologicalParameter= PhysiologicalParameter::find($id);
             if(!$physiologicalParameter){
                return response()->json(['No existe',404]);   
            }
     
        $physiologicalParameter->delete();
      
        return response()->json($physiologicalParameter,200);

        }catch(ModelNotFoundException $e){
            return response()->json(['Error: '.$e], 204);
        }
    }
}
