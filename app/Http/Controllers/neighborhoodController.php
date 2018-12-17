<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Neighborhood;

class neighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neighborhoods = Neighborhood::all()->toArray();     
       
        return response()->json($neighborhoods);  
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
       $neighborhoods = Neighborhood::create([
        'neighborhood_description'=>request('neighborhood_description'),
        'neighborhood_name'=>request('neighborhood_name'),
        'city_id'=>request('city_id')
    ]);

        return response()->json($neighborhoods, 201);
        
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
        
    $neighborhood = Neighborhood::find($id);

    if(!$neighborhood){
     return response()->json(['No existe',404]);   
    }

     return response()->json($neighborhood,200);
 
    }

    public function update(Request $request, $id)
    { 
        $neighborhood_name=request('neighborhood_name');
        $city_id=request('city_id');
        $neighborhood_description=request('neighborhood_description');
        
        try{
        $neighborhood= Neighborhood::find($id);
             if(!$neighborhood){
                return response()->json(['No existe',404]);   
            }
     

        $neighborhood->neighborhood_name = $neighborhood_name? $neighborhood_name : $neighborhood->neighborhood_name;

$neighborhood->neighborhood_description = $neighborhood_description? $neighborhood_description : $neighborhood->neighborhood_description;


$neighborhood->city_id = $city_id? $city_id : $neighborhood->city_id;


        $neighborhood->save();
        return response()->json($neighborhood,200);
        
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
        $neighborhood= Neighborhood::find($id);
             if(!$neighborhood){
                return response()->json(['No existe',404]); 
        }
             $neighborhood->delete();
      
        return response()->json($neighborhood,200);

                }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }
}
}
