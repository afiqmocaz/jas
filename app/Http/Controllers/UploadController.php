<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
     public function uploadFile(Request $request){
  
       $req = $request->file();
       $file = $req['file'];
      
       
//     $file = $request->file('image');
//     dd($file);
//   
//      //Display File Name
//      echo 'File Name: '.$file->getClientOriginalName();
//      echo '<br>';
//   
//      //Display File Extension
//      echo 'File Extension: '.$file->getClientOriginalExtension();
//      echo '<br>';
//   
//      //Display File Real Path
//      echo 'File Real Path: '.$file->getRealPath();
//      echo '<br>';
//   
//      //Display File Size
//      echo 'File Size: '.$file->getSize();
//      echo '<br>';
//   
//      //Display File Mime Type
//      echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
      $fileId = uniqid().'.'.$file->getClientOriginalExtension(); 
       
      $destinationPath = 'uploads';
      $file->move($destinationPath,$fileId);
      
      return $fileId;
        
    }
}
