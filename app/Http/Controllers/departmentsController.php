<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

class departmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $departments = Department::all()->toArray();

     return response()->json($departments);   
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
       $departments = Department::create([
        'department_name'=>request('department_name'),
        'department_description'=>request('department_description')]);

        return response()->json($departments, 201);
        }catch(Exception $e){
            return response()->json(['Error updating: '.$e], 204);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($department_id)
    {
       
    $department = Department::find($department_id);

    if(!$department){
     return response()->json(['No existe',404]);   
    }

     return response()->json($department,200);
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
      $department_name=request('department_name');
        $department_description=request('department_description');
        
        try{
        $department= Department::find($id);
             if(!$department){
                return response()->json(['No existe',404]);   
            }
     

        $department->department_name = $department_name? $department_name : $department->department_name;

        $department->department_description = $department_description? $department_description : $department->department_description;
        
        $department->save();
        return response()->json($department,200);
        }catch(ModelNotFoundException $e){
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
            $department= Department::find($id);
             if(!$department){
                return response()->json(['No existe',404]);   
            }
     
        $department->delete();
      
        return response()->json($department,200);

        }catch(ModelNotFoundException $e){
            return response()->json(['Error deleting: '.$e], 204);
        }
    }
}
