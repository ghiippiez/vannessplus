<?php

namespace VannessPlus\Http\Controllers;

use vanness_db;

use Illuminate\Http\Request;

class UploadController extends Controller {
   public function index(){
      return view('upload');
   }
   public function showUploadFile(Request $request){
      $file = $request->file('fileupload');
   
      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      

      return redirect('/');

     
   }

   public function upload()
   {
       return view('upload');
       
   }

   public function getUploadXlsx()
   {
       dd(File::allFiles('fileupload'));
       return View::make('pages.bible-listen')->with('file',File::allFiles('fileupload'));
   }
}