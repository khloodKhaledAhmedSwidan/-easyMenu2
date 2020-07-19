<?php

namespace App\Http\Controllers\website;

use App\Coupon;
use App\Package;
use App\SellerCode;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function packages()
    {
        $packages = Package::all();
        return view('packages', compact('packages'));
    }

    public function chooseProduct($id)
    {
        $package = Package::find($id);
        return view('subscripe-package', compact('package'));
    }

//    public function coponesProduct(Request $request)
//    {
//$copone = Coupon::where('name',$request->name)->first();
//if($copone){
//    return responseJson(1,'success');
//}else{
//    return responseJson(0,'doesnot match');
//}
//
//    }

//    public function checkCoupon(Request $request)
//    {
//        $coupon = Coupon::where('name', $request->coupon)->first();
//        if ($coupon) {
//            return responseJson(1,'success',$coupon);
//        } else {
//
//            return response()->json("here");
//        }
//    }
 public function restaurantSubscribe(Request $request,$id){
//dd($id);
        $package = Package::find($id);
        $restEmail = $request->email;
        $restaurant= User::where('email',$restEmail)->first();
        if($restaurant){
            if ($restaurant->type ==0){
//$coupon = Coupon::where('name',$request->coupon)->select('id','percentage')->get();
                $coupon = Coupon::where('name',$request->coupon)->first();
                if($coupon){
                    $discount_code = $coupon->id;
                    $sellerCode = SellerCode::where('name',$request->sellerCode)->pluck('id');
                    $discount = ($package->price * $coupon->percentage)/100;
                    $price = $package->price -$discount;
                    $packageDuration = $package->duration;
                    $now =Carbon::now('m');
                    $end=   $now->addMonths($packageDuration);
                    Subscription::create([
                        'package_id ' =>$package->id,
                        'user_id ' => $restaurant->id,
                        'seller_code_id ' =>$sellerCode,
                        'discount_code_id ' => $discount_code,
                        'price' =>$price,
                        'end_at' =>$end,
                    ]);
                    return responseJson(1,"success");
                }else{
//                    $discount_code = $coupon->id;
                    $sellerCode = SellerCode::where('name',$request->sellerCode)->pluck('id');
//                    $discount = ($package->price * $coupon->percentage)/100;
//                    $price = $package->price -$discount;
                    $packageDuration = $package->duration;
                    $now =Carbon::now('m');
                    $end=   $now->addMonths($packageDuration);
                    Subscription::create([
                        'package_id ' =>$package->id,
                        'user_id ' => $restaurant->id,
                        'seller_code_id ' =>$sellerCode,
                        'price' =>$package->price,
                        'end_at' =>$end,
                    ]);
                    return responseJson(1,"success");
                }

            }else{
                flash('لا تمتلك صلاحية الدخول لهذه الصفحة');
            }
        }else{
            flash('لا يوجد لك حساب ');
            return back();
        }
 }
}
