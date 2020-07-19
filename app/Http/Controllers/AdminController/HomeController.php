<?php

namespace App\Http\Controllers\AdminController;

use App\Certification;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('bank_payments_edit','bank_payments_update');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $admins = DB::table('admins')->count();
        return view('admin.home', compact('users', 'admins'));
    }

    public function orders()
    {
        $orders = Order::where('status', 0)->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function paidOrders()
    {
        $orders = Order::where('status', 1)->get();
        return view('admin.orders.paid', compact('orders'));
    }

    public function canceledOrders()
    {
        $orders = Order::where('status', 2)->get();
        return view('admin.orders.canceled', compact('orders'));
    }

    /**
     *  edit the payment status
     * @bank_payments_edit
     */
    public function bank_payments_edit($id)
    {

        $bank = Order::findOrFail($id);
        return view('admin.payments.edit_bank_payment', compact('bank'));
    }

    /**
     *  update the bank payment status
     * @bank_payments_update
     */
    public function bank_payments_update(Request $request, $id)
    {
        // dd($request->all());
        $bank = Order::findOrFail($id);
        $bank->update([
            'status' => $request->status,
            'notes'  => $request->notes
        ]);
        flash('تم التعديل بنجاح');
        return redirect()->route('orders.index');
    }

    public function showOrder($id)
    {
        $order = Order::find($id);
        return view('admin.orders.show', compact('order'));
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->update(['status' => 2]);
        flash('تم الغاء الطلب');
        return back();
    }
}
