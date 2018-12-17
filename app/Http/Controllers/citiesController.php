<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;

class citiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cities = City::all()->toArray();     
       
        return response()->json($cities);  
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
       $cities = City::create([
        'city_description'=>request('city_description'),
        'department_id'=>request('department_id')]);

        return response()->json($cities, 201);
        
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
        
    $city = City::find($id);

    if(!$city){
     return response()->json(['No existe',404]);   
    }

     return response()->json($city,200);
 
    }

    public function update(Request $request, $id)
    { 
        $city_description=request('city_description');
        $department_id=request('department_id');
        
        try{
        $city= City::find($id);
             if(!$city){
                return response()->json(['No existe',404]);   
            }
     

        $city->city_description = $city_description? $city_description : $city->city_description;

        $city->department_id = $department_id? $department_id : $city->department_id;

        
        $city->save();
        return response()->json($city,200);
        
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
        $city= City::find($id);
             if(!$city){
                return response()->json(['No existe',404]); 
        }
             $city->delete();
      
        return response()->json($city,200);

                }catch(Exception $e){
            return response()->json(['Error: '.$e], 204);
        }
}

}
