<?php

namespace App\Http\Controllers;


use App\Contact;
use App\Cart;
use App\Coupon;
use App\Meal;
use App\Order;
use App\Package;
use App\User;
use App\Size;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, User $user)
    {
        $this->middleware('auth:web')->only(['landpage', 'home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user, $table_id = null)
    {
        if ($table_id != null) {
            session()->put('table_id', $table_id);
        }
        // dd(session()->get('table_id'));
        $start_at = $user->shifts()->orderBy('from', 'asc')->pluck('from')->first();
        $end_at = $user->shifts()->orderBy('from', 'desc')->pluck('to')->first();
        $now = Carbon::now()->format('H:i');
        $resActive = 0;
        if ($now > $start_at && $now < $end_at) {
            $resActive = 1;
        }

        if ($user->active == 0) {
            abort(404, 'not found');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if ($cart->restaurant_id == $user->id) {
            return view('welcome', compact('user', 'resActive'));
        }
        Session::forget('cart');
        // $cities = $user->where('type',0)->cities()->pluck('name','id')->get();

        return view('welcome', compact('user', 'resActive'));
    }

    // public function sgetCart(User $user)
    // {
    //     $start_at = $user->shifts()->orderBy('from', 'asc')->pluck('from')->first();
    //     $end_at = $user->shifts()->orderBy('from', 'desc')->pluck('to')->first();
    //     $now = Carbon::now()->format('H:i');
    //     $resActive = 0;
    //     if ($now > $start_at && $now < $end_at) {
    //         $resActive = 1;
    //     }

    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);
    //     if ($cart->items == null) {
    //         return view('cart', compact('user', 'resActive'));
    //     }
    //     if ($cart->restaurant_id != $user->id) {
    //         Session::forget('cart');
    //     }
    //     // dd($cart);
    //     $products = array_pluck($cart->items, 'item');
    //     $id = array_pluck($products, 'id');
    //     $vat = $user->vat == null ? 0 : $user->vat / 100;
    //     $priceBeforeVat = $cart->totalPrice;
    //     $cart->totalPrice += ($vat * $cart->totalPrice);
    //     $totalPrice = $cart->totalPrice;

    //     $start_at = $user->shifts()->orderBy('from', 'asc')->pluck('from')->first();
    //     $end_at = $user->shifts()->orderBy('from', 'desc')->pluck('to')->first();
    //     $now = Carbon::now()->format('H:i');
    //     $resActive = 0;
    //     if ($now > $start_at && $now < $end_at) {
    //         $resActive = 1;
    //     }


    //     return view('cart', compact('user', 'products', 'totalPrice', 'cart', 'id', 'resActive', 'priceBeforeVat'));
    // }

    public function getCart(User $user)
    {
        // dd('i\'m here');
        $start_at = $user->shifts()->orderBy('from', 'asc')->pluck('from')->first();
        $end_at = $user->shifts()->orderBy('from', 'desc')->pluck('to')->first();
        $now = Carbon::now()->format('H:i');
        $resActive = 0;
        if ($now > $start_at && $now < $end_at) {
            $resActive = 1;
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $totalPrice = $cart == null ? 0 : $cart->totalPrice;

        if ($cart->items == null) {
            return view('cart', compact('user', 'resActive', 'totalPrice'));
        }
        if ($cart->restaurant_id != $user->id) {
            Session::forget('cart');
            // Session::forget('table_id');
        }
        // dd($cart);

        $products = array_pluck($cart->items, 'item');
        $id = array_pluck($products, 'id');
        $vatPercentage = $user->vat;
        $vat = $vatPercentage == null ? 0 : $user->vat / 100;
        $priceBeforeVat = $cart->totalPrice;
        $vatAddition = ($vat * $cart->totalPrice);
        $priceAfterVat = $cart->totalPrice + $vatAddition;

        $deliveryPrice = $user->delivery_price;
        $cart->totalPrice = $deliveryPrice + $priceAfterVat;
        $totalPrice = $cart == null ? 0 : $cart->totalPrice;

        $start_at = $user->shifts()->orderBy('from', 'asc')->pluck('from')->first();
        $end_at = $user->shifts()->orderBy('from', 'desc')->pluck('to')->first();
        $now = Carbon::now()->format('H:i');
        $resActive = 0;
        if ($now > $start_at && $now < $end_at) {
            $resActive = 1;
        }

        $table_id = session()->get('table_id');


//        dd($user);

        return view('cart', compact('user', 'products', 'totalPrice',
            'cart', 'id', 'resActive', 'table_id',
            'priceBeforeVat', 'vat', 'vatPercentage',
            'deliveryPrice', 'priceAfterVat', 'vatAddition'));
    }


    public function landpage()
    {
        return view('home');
    }

    public function home()
    {
        return view('res-landpage');
    }

    public function splash()
    {
        $packages = Package::all();
        return view('splash', compact('packages'));
    }


    public function categoryProducts(User $user, $id)
    {
        $products = $user->meals()->where('category_id', $id)->get();
        $sizes = Size::all();

        $category = $user->categories()->where('id', $id)->first();
        return view('products', compact('user', 'products', 'category'));
    }

    public function showProduct(User $user, $id)
    {
        $meal = Meal::find($id);

        return view('product-details', compact('meal', 'user'));
    }

    public function chooseProduct(User $user, $id)
    {
        $meal = Meal::findOrFail($id);
        $cat = $meal->category;
        return view('choose-meal', compact('meal', 'user', 'cat'));
    }

    public function postOrder(Request $request)
    {
        $this->validate($request, [
            "delivery_status" => "required_if:table_id,==,null",
            "branch_id" => "nullable",
            "name" => "required",
            "phone" => "required",
            // "adderss" => "required_if:delivery_status,==,0",
            "latitude" => "required_if:delivery_status,==,0",
            "longitude" => "required_if:delivery_status,==,0",
        ]);
        $cart = Session::get('cart');
        $table_id = Session::get('table_id');
        $user = User::find($request->user_id);
        $min = $user->minimum;
        if ($min > $request->totalPrice) {

            flash(' لا يمكنك اضافه طلب اقل   من الحد الادني' . $min . ' RS')->error();
            //            return redirect()->route('cat-products', ['user' => $user, 'id' => $meal->category->id]);
            //                return view('message', compact('user'));
            return redirect()->route('restaurants', $user);

        }
        if ($cart != null) {
            $order = Order::create([
                'user_id' => $request->user_id,
                'branch_id' => $request->branch_id == null ? null : $request->branch_id,
                // 'total_price' => $request->delivery_status == 0 ? $request->totalPrice + $request->deliveryPrice : $request->totalPrice,
                'delivery' => $request->delivery_status,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address == null ? null : $request->address,
                'latitude' => $request->latitude == null ? null : $request->latitude,
                'longitude' => $request->longitude == null ? null : $request->longitude,
                'cart_items' => serialize($cart),
                'status' => '0',
            ]);
            if ($table_id != null) {
                $table = Table::find($table_id);
                $branch = $table->branch->id;
                $order->update(['table_id' => $table_id, 'branch_id' => $branch]);
            }
            // dd($order);
            $products = array_pluck($cart->items, 'item');
            $id = array_pluck($products, 'id');
            $order->meals()->sync($id);
        }

        $user = User::find($request->user_id);
        $phone = $user->phone;
        Session::forget('cart');
        Session::forget('table_id');
        flash('تم استلام طلبك بنجاح رقم الطلب هو ' . $order->id . ' يمكنك التواصل مع المطعم من خلال هذا الرقم ' . $phone);
        return redirect()->back();

    }


    public function getContacts()
    {
        return view('website.pages.contacts');
    }


    /**
     * save client message to storage
     *
     * @param Request $request
     * @return void
     */
    public function postContacts(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
        $messages = [
            'name.required' => 'برجاء ادخال اسم',
            'email.required' => 'برجاء ادخال الايميل',
            'email.email' => 'برجاء ادخال ايميل صحيح',
            'message.required' => 'برجاء ادخال رسالتك',
        ];
        $validation = $this->validate($request, $rules, $messages);
        if ($validation) {
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            flash('تم استلام رسالتك بنجاح , سيتم الرد عليك في اقرب وقت.')->success();
            return back();
        }
    }

    public function editProfile()
    {
        $model = auth()->user();
        return view('website.users.edit_profile', compact('model'));
    }

    public function updateProfile(Request $request)
    {
        //|starts_with:966

        $this->validate($request, [
            'name_ar' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'delivery' => 'required',
            'delivery_price' => 'required_if:delivery,1',
            'phone_number' => 'required',
            // 'vat' => 'required',
            'minimum' => 'required',
            'delivery_from' => 'required',
            'delivery_to' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:5000',
        ]);


        $user = auth()->user();
//        dd(auth()->user());
        $user->update($request->except('image'));
//           if ($request->hasFile('image')) {
//            if(file_exists($user->image))
//                unlink($user->image);
//            $path = public_path();
//            $destinationPath = $path . '/uploads/users/'; // upload path
//            $photo = $request->file('image');
//            $extension = $photo->getClientOriginalExtension(); // getting image extension
//            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
//            $photo->move($destinationPath, $name); // uploading file to given path
//            $user->image = 'uploads/users/' . $name;
//            $user->save();
//        }


        $user->update([
            'image' => $request->file('image') == null ? $user->image : UploadImage($request->file('image'), 'image', '/uploads/users'),
        ]);
        flash('تم التعديل بنجاح')->success();
        return back();
    }


    public function changePasswordPage()
    {
        $model = auth()->user();
        return view('website.users.change_password', compact('model'));
    }

    public function changePassword(Request $request)
    {


        $this->validate($request, [

            'password' => 'min:8|nullable|confirmed',
            'password_confirmation' => 'required_with:passowrd',

        ]);

        auth()->user()->update([
            'password' => Hash::make($request->password)
        ]);
        flash('تم التعديل بنجاح')->success();
        return back();

    }

    public function barcodeRes()
    {
        $model = auth()->user();
        return view('website.users.barcode', compact('model'));
    }
//     public function branchMeals(Request $request, User $user){
// dd($request->all());
//     }


    public function deliveryOrder()
    {
        $user = auth()->user();
        if ($user->type == 0) {

            $orders = Order::where('user_id', $user->id)->where('status', '0')->where('delivery', 0)->get();
//dd($orders);
            return view('delivery-orders', compact('orders'));

        } else {
            return redirect()->back();
        }
    }

    public function redirectOrderPage($id)
    {
        $user = auth()->user();
        if ($user->type == 0) {
            $order = Order::find($id);
//$allBranches = User::where('restaurant_id',$user->id)->pluck('name_ar','id')->all();
            $allBranches = $user->restaurantBranches()->get();
            return view('redirect-order', compact('allBranches', 'order'));

        } else {
            return redirect()->back();
        }
    }

    public function redirectOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $branch = User::find($request->allBranches);

//        $order->create(['branch_id' => $branch]);
//       $branch->where('id',$branch->id)->branchOrders()->update([
//           'branch_id' => $branch->id,
//       ]);
       $order->where('id',$order->id)->update([ 'branch_id' => $branch->id,]);
        flash("تم تحويل الطلب بنجاح");
        return redirect()->back();

    }
    public function payBank($user){
        $user = User::find($user);
        return view('pay-by-bank',compact('user'));
    }
    public function payByBank(Request $request,$id){
$coupon = Coupon::where('name',$request->coupon)->first();
//dd($coupon->id);
$user = User::find($id);
//dd($user);
        if($coupon){
$subscription = $user->subscriptions()->where('user_id',$user->id)->first();
//$oldPrice = $subscription->price;
$package =  Package::where('id',$subscription->package_id)->first();
$discount = ($package->price * $coupon->percentage)/100;
$newPrice = $package->price - $discount ;
//dd($newPrice);
$user->subscriptions()->where('user_id',$user->id)->update(
    [
        'price' => $newPrice,
        'discount_code_id' => $coupon->id,
    ]
);

            flash("سعر الباقة بعد الخصم".$newPrice);
//    return redirect()->route('pay.bankPage',$user->id);
            return  back();

}else{
//    return redirect()->route('pay.bankPage',$user->id);
            flash("تاكد من كتابه كود الاحاله");
//            return response()->json();
}
    }
}
