<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\UserDevice;

class SubscriptionController extends Controller
{
    public function index()
    {
        $records = Subscription::where('status', 0)->where('finished', 0)->get();
        // dd($records);
        return view('admin.subscriptions.index', compact('records'));
    }

    public function paid()
    {
        $records = Subscription::where('status', 1)->where('finished', 0)->get();
        // dd($records);
        return view('admin.subscriptions.paid', compact('records'));
    }

    public function finished()
    {
        $records = Subscription::where('finished', 1)->get();
        // dd($records);
        return view('admin.subscriptions.finished', compact('records'));
    }

    public function updateStatus($id)
    {
        $bank = Subscription::find($id);
        return view('admin.subscriptions.update', compact('bank'));
    }

    public function postUpdateStatus(Request $request, $id)
    {
        // dd($request->all(), $id);
        $this->validate($request, [
            'status' => 'required'
        ]);
        $order = Subscription::findOrFail($id);
        $order->update([
            'status' => 1
        ]);
        flash('تم تعديل حالة الدفع بنجاح');
        return redirect()->route('subscriptions.index');
    }

    /**
     * delete specific resource from storage
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $order = Subscription::findOrFail($id);
        $order->delete();
        flash('تم الحذف بنجاح');
        return back();
    }
}
