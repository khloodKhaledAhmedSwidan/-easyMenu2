<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{


    public function new()
    {
        $user = auth()->user();
        if(!$user->type == 0){

        $orders = $user->branchOrders()->where('status','0')->where('branch_id',$user->id)->get();
        return view('admin.orders.index', compact('orders'));
    }else {
return redirect()->back();
    }


    }

    public function activeOrders()
    {
        $user = auth()->user();
        if(!$user->type == 0){
        $orders = $user->branchOrders()->where('status', '1')->where('branch_id',$user->id)->get();
        return view('admin.orders.paid', compact('orders'));
    }else {
        return redirect()->back();
            }
    }

    public function compeletedOrders()
    {
        $user = auth()->user();
        if(!$user->type == 0){
        $orders = $user->branchOrders()->where('status', '2')->where('branch_id',$user->id)->get();

        return view('admin.orders.compeleted', compact('orders'));
        }else{
            return redirect()->back();
        }
    }

    public function canceledOrders()
    {
        $user = auth()->user();
        if(!$user->type == 0){
        $orders = $user->branchOrders()->where('status', '3')->where('branch_id',$user->id)->get();
        return view('admin.orders.canceled', compact('orders'));
        }else{
            return redirect()->back();
        }
    }


    public function showOrder($id)
    {

        $order = Order::find($id);

        $order_details = unserialize($order->cart_items);
        // dd($order_details);
        return view('admin.orders.show', compact('order', 'order_details'));
    }

    public function deleteOrder($id)
    {

        $order = Order::find($id);
        $order->delete();
        flash('تم حذف الطلب');
        return back();
    }
}
