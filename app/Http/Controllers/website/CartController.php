<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Branch;
use App\Meal;
use App\User;
use Session;

class CartController extends Controller
{
    /**
     * add Meal to the cart
     *
     * @param Request $request
     * @param [Meal] $id
     * @return void
     */
    public function addToCart(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($request->user_id);
//dd($request->all());
        // $this->validate($request, ["size_id" => "required"]);
        $meal = Meal::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($meal, $meal->id, $request);

        $request->session()->put('cart', $cart);
        $quantity = $cart->items[$id]['quantity'];
        $price = $cart->items[$id]['price'];
        $cartTotal = $cart->totalPrice;
        $cartQuan = $cart->totalQuantity;
        $data = [
            'quantity' => $quantity,
            'price' => $price,
            'total' => $cartTotal,
            'cartQuan' => $cartQuan,
        ];

        if ($request->ajax()) {

            return responseJson(1, 'success', $data);
        } else {

          flash('تم الأضافة الي  العربة بنجاح')->success();
//            return redirect()->route('cat-products', ['user' => $user, 'id' => $meal->category->id]);
//                return view('message', compact('user'));
          return redirect()->route('restaurants' , $user);
        }
    }


    /**
     * reduce Meal quantity at the cart page.
     *
     * @param [Meal] $id
     * @return void
     */
    public function reduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $check = $cart->reduceOne($id);
        //is there still numbers of this item or not
        if ($check) {
            Session::put('cart', $cart);
            $quantity = $cart->items[$id]['quantity'];
            $price = $cart->items[$id]['price'];
            $cartTotal = $cart->totalPrice;
            $cartQuan = $cart->totalQuantity;
            $data = [
                'quantity' => $quantity,
                'price'    => $price,
                'total' => $cartTotal,
                'cartQuan' => $cartQuan,
            ];

            return responseJson(1, 'success', $data);
        } else {
            return json_encode("last");
        }
    }

    /**
     * send request to Cart Model to remove item.
     *
     * @param [item] $id
     * @return void
     */
    public function remove($id)
    {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $check = $cart->removeItem($id);

        if ($check['del'] && $check['quan']) {
            Session::put('cart', $cart);
            flash('تم الحذف ');
            return back();
        } elseif (!$check['del'] && $check['quan']) {
            Session::put('cart', $cart);
            flash('حدث خطا ما برجاء المحاولة لاحقا')->error();
            return back();
        } elseif ($check['del'] && !$check['quan']) {
            Session::forget('cart');
            flash(' تم الحذف بنجاح')->success();
            $data = "no cart";
            return back();
        }
    }

    public function get_branches($id)
    {
        $branches = User::whereCity_id($id)->pluck('name_ar' , 'id');
        return $branches;
    }
}
