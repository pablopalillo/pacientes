<?php

namespace App\Http\Controllers;
use App\Diseases;

use Illuminate\Http\Request;

class DiseasesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $diseases = Diseases::all()->toArray();
      return response()->json($diseases);
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
        $diseases = Diseases::create([
          'disease_name'=>request('disease_name'),
          'disease_description'=>request('disease_description')
        ]);
        return response()->json($diseases, 201);

      }catch(Exception $e) {
          return response()->json(['Error: '.$e], 204);
      }
        
    }

    public function update(Request $request, $id)
    {
        $diseaseName = $request('disease_name');
        $diseaseDescription = $request('disease_description');

        try{

          $disease = Diseases::find($id)->first();

          if($disease ) {
            $disease->disease_name = $diseaseName;
            $disease->disease_description = $diseaseDescription;
            $disease->save();
          }
        
          return response()->json($disease, 201);

        } catch(Exception $e) {

          return response()->json(['Error: '.$e], 204);

        }
    }

    public function destroy($id) 
    {

      try {
        $disease = Diseases::find($id);

        if($disease) {
          $disease->delete();
        }
       
        return response()->json(["Done", 201]);

      } catch(Exception $e) {
          return response()->json(['Error: '.$e], 204);
      }

    }
}