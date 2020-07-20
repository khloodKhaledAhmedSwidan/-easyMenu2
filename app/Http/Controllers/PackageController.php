<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Package;

class PackageController extends Controller
{
    //
    public function showPackageSubscripe()
    {
        $user = auth()->user();
//    dd($user->id);
        if ($user->type == 0) {
            $subscription = $user->subscriptions()->where('user_id', $user->id)->first();


            $packageDuration = Package::find($subscription->package_id)->duration;


            $now = Carbon::now()->toDateString();
            $end_date = $subscription->end_at;
            $lengthOfAd = $end_date->diffInMonths($now);
            $mainDuration = (int)$packageDuration;
            $duration = (int)$lengthOfAd;
            $reminder = $mainDuration - $duration;

            return view('website.users.subscripe-package', compact('subscription', 'reminder'));
        } else {
            flash('لا يمكنك دخول هذه الصفحة');
            return back();
        }
    }

    public function changePackage($id)
    {
        $package = Package::find($id);
        return view('website.users.change-package', compact('package'));
    }

    public function changeedPackage(Request $request, $id)
    {
        $oldPackage = Package::find($id);
        $oldPackageId = $oldPackage->id;
        $newPackage = $request->package_id;
$status = $newPackage == 1 ? 1:0;
        $findDuration = Package::find($newPackage)->duration;
        $now = Carbon::now('m');
        $end = $now->addMonths($findDuration);
        $price = Package::where('id', $newPackage)->pluck('price')->first();
        // dd($price);
        $user = auth()->user();
        $user->subscriptions()->where('package_id', $oldPackageId)->update(['finished' => 1]);
        $user->subscriptions()->create(
            [
                'package_id' => $newPackage,
                'status' => $status,
                'price' => $price,
                'end_at' => $end,

            ]
        );
        flash('تم تغيير الباقة');
        return redirect()->route('pay.bankPage', $user->id);

    }
}
