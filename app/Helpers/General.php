<?php

use Illuminate\Support\Facades\App;
 function apiResponse($status, $msg, $data)
 {

     $response = [
         'status' => $status,
         'message' => $msg,
         'data' => $data,

     ];

     return response()->json($response);
 }
 function apiLists($table, $request)
 {

    $response = $table::where(function($query)use($request){
        if($request->has('locale')){
            App::setLocale($request->locale);
            $query->with('translations')->where('is_active',1);
        }
        })->get();
     return response()->json($response);
 }

 function isActive($isActive,$table){
    if ($isActive == 'on') {

        $table->is_active = true;
    } else {
        $table->is_active = false;
    }
 }
