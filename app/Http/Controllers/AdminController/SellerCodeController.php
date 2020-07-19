<?php

namespace App\Http\Controllers\AdminController;

use App\SellerCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = SellerCode::get();
        return view('admin.sellercodes.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sellercodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            // 'seller_name' => 'required',
            // 'percentage'  => 'required',
            ]);
        SellerCode::create($request->all());
        flash('تم اضافة الكود بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellerCode  $sellerCode
     * @return \Illuminate\Http\Response
     */
    public function show(SellerCode $sellerCode)
    {
        return view('admin.sellercodes.show', compact('sellerCode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerCode  $sellerCode
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerCode $sellerCode)
    {
        return view('admin.sellercodes.edit', compact('sellerCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerCode  $sellerCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerCode $sellerCode)
    {
        $this->validate($request, [
            'name'        => 'required',
            // 'seller_name' => 'required',
            // 'percentage'  => 'required',
            ]);
        $sellerCode->update($request->all());
        flash('تم تعديل الكود بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerCode  $sellerCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = SellerCode::findOrFail($id);
        $code->delete();
        flash('تم الحذف بنجاح ');
        return back();
    }
}
