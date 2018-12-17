<?php

namespace App\Http\Controllers;

use App\DocumentType;

use Illuminate\Http\Request;

class documentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $documentTypes = DocumentType::all()->toArray();

     return response()->json($documentTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $documentTypes = DocumentType::create([
        'document_type_name'=>request('document_type_name'),
        'document_type_description'=>request('document_type_description')

      ]);

        return response()->json($documentTypes, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $document_type_id
     * @return \Illuminate\Http\Response
     */
    public function show($document_type_id)
    {
    
    $documentType = DocumentType::find($document_type_id);

    if(!$documentType){
     return response()->json(['No existe',404]);   
    }

     return response()->json($documentType,200);
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
        $document_type_name=request('document_type_name');
        $document_type_description=request('document_type_description');
        
        try{
        $documentType= DocumentType::find($id);
             if(!$documentType){
                return response()->json(['No existe',404]);   
            }
     

        $documentType->document_type_name = $document_type_name? $document_type_name : $documentType->document_type_name;
        $documentType->document_type_description = $document_type_description? $document_type_description : $documentType->document_type_description;
        
        $documentType->save();
        return response()->json($documentType,200);
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
            $documentType= DocumentType::find($id);
             if(!$documentType){
                return response()->json(['No existe',404]);   
            }
     
        $documentType->delete();
      
        return response()->json($documentType,200);

        }catch(ModelNotFoundException $e){
            return response()->json(['Error: '.$e], 204);
        }
    }
}
