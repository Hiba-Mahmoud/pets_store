<?php
 function apiResponse($status, $msg, $data)
 {

     $response = [
         'status' => $status,
         'message' => $msg,
         'data' => $data,

     ];

     return response()->json($response);
 }

 function isActive($isActive,$table){
    if ($isActive == 'on') {

        $table->is_active = true;
    } else {
        $table->is_active = false;
    }
 }
