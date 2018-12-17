<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExerciseRoutine;


class exerciseRoutinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $exerciseRoutine = ExerciseRoutine::all()->toArray();

     return response()->json($exerciseRoutine);
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
       $exerciseRoutine = ExerciseRoutine::create([
        'exercise_routine_name'=>request('exercise_routine_name'),
        'exercise_routine_url'=>request('exercise_routine_url'),
        'exercise_routine_description'=>request('exercise_routine_description')
    ]);

        return response()->json($exerciseRoutine, 201);
        }catch(Exception $e){
            return response()->json(['Error'.$e], 204);
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
            $exerciseRoutine = ExerciseRoutine::find($id);

    if(!$exerciseRoutine){
     return response()->json(['No existe',404]);   
    }

     return response()->json($exerciseRoutine,200);
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
        $exercise_routine_name=request('exercise_routine_name');
        $exercise_routine_url=request('exercise_routine_url');
         $exercise_routine_description=request('exercise_routine_description');
        

        try{
        $exerciseRoutine= ExerciseRoutine::find($id);
             if(!$exerciseRoutine){
                return response()->json(['No existe',404]);   
            }
     

        $exerciseRoutine->exercise_routine_name = $exercise_routine_name? $exercise_routine_name : $exerciseRoutine->exercise_routine_name;

        $exerciseRoutine->exercise_routine_url = $exercise_routine_url? $exercise_routine_url : $exerciseRoutine->exercise_routine_url;

        $exerciseRoutine->exercise_routine_description = $exercise_routine_description? $exercise_routine_description : $exerciseRoutine->exercise_routine_description;
        
        $exerciseRoutine->save();
        return response()->json($exerciseRoutine,200);
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
            $exerciseRoutine= ExerciseRoutine::find($id);
             if(!$exerciseRoutine){
                return response()->json(['No existe',404]);   
            }
     
        $exerciseRoutine->delete();
      
        return response()->json($exerciseRoutine,200);

        }catch(ModelNotFoundException $e){
            return response()->json(['Error: '.$e], 204);
        }
    }
}
