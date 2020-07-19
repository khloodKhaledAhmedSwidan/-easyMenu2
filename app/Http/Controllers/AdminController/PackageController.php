<?php

namespace App\Http\Controllers\AdminController;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Package::get();
        return view('admin.packages.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
//        $this->validate($request, [
//            "name"            => 'required',
//            "description"     => 'required',
//            "name_ar"            => 'required',
//            "description_ar"     => 'required',
//            // "pinned_shop_num" => 'required',
//            "duration"        => 'required',
//            "products"        => 'required',
//            // "pinned_products" => 'required',
//            "price"           => 'required'
//        ]);
//        Package::create($request->all());
//        flash('تم اضافة ' . $request->name . ' بنجاح ');
//        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
  return  view('admin.packages.show',compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $this->validate($request, [
            "name"            => 'required',
            "description"     => 'required',
            "name_ar"            => 'required',
            "description_ar"     => 'required',
            // "pinned_shop_num" => 'required',
            "duration"        => 'required',
            "products"        => 'required',
            // "pinned_products" => 'required',
            "price"           => 'required'
        ]);
        $package->update($request->all());
        flash('تم تعديل ' . $request->name . ' بنجاح ');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
//        if ($package->subscriptions()->count() > 0) {
//            flash('لا يمكن حذف هذه الباقة يوجد مشتركين بها')->error();
//            return back();
//        }
//        $package->delete();
//        flash('تم الحذف بنجاح');
//        return back();
    }
}
