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
