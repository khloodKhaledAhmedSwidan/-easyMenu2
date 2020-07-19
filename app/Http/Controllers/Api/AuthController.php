<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function registerMobile(Request $request) {
         $rules = [
             'email' => 'required|unique:users',
         ];

         $validator = Validator::make($request->all(), $rules);

         if ($validator->fails())
             return ApiController::respondWithErrorArray(validateRules($validator->errors(), $rules));

         $code = mt_rand(1000, 9999);
         $data = [
             'code'          => $code,
         ];
         Mail::to($request->email)->send(new App\Mail\ConfirmCode($data));

//        $code = mt_rand(1000, 9999);
//            $jsonObj = array(
//            'mobile' => 'tqnee.com.sa',
//            'password' => '589935sa',
//            'sender'=>'TQNEE',
//            'numbers' => $request->phone_number,
//            'msg'=>'كود التأكيد الخاص بك في كم سعر هو :'.$code,
//
//            'msgId' => rand(1,99999),
//
//            'timeSend' => '0',
//
//            'dateSend' => '0',
//
//            'deleteKey' => '55348',
//            	'lang' => '3',
//            	'applicationType' => 68,
//            );
//            // دالة الإرسال JOSN
//            $result=$this->sendSMS($jsonObj);
//

//        $ans= substr($ans,0,1);
         $created = App\PhoneVerification::create([
             'code'=>$code,
             'phone_number'=>$request->email
         ]);


         return  ApiController::respondWithSuccess([]);
     }


}
