<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    public static function respondWithSuccess($data) {
        http_response_code(200);
        return response()->json(['mainCode'=> 1,'code' =>  http_response_code()  , 'data' => $data, 'error' => null])->setStatusCode(200);
    }

    public static function respondWithErrorArray($errors) {
        http_response_code(422);  // set the code
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(422);
    }public static function respondWithErrorObject($errors) {
    http_response_code(422);  // set the code
    return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(422);
}
    public static function respondWithErrorNOTFoundObject($errors) {
        http_response_code(404);  // set the code
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(404);
    }
    public static function respondWithErrorNOTFoundArray($errors) {
        http_response_code(404);  // set the code
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(404);
    }
    public static function respondWithErrorClient($errors) {
        http_response_code(400);  // set the code
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(400);
    }
    public static function respondWithErrorAuthObject($errors) {
        http_response_code(401);  // set the code
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(401);
    }
    public static function respondWithErrorAuthArray($errors) {
        http_response_code(401);  // set the code
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(401);
    }


    public static function respondWithServerErrorArray() {
        $errors = 'Sorry something went wrong, please try again';
        http_response_code(500);
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(500);
    }
    public static function respondWithServerErrorObject() {
        $errors = 'Sorry something went wrong, please try again';
        http_response_code(500);
        return response()->json(['mainCode'=> 0,'code' =>  http_response_code()  , 'data' => null, 'error' => $errors])->setStatusCode(500);
    }

}
