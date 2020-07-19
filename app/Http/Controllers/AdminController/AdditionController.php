<?php

namespace App\Http\Controllers\AdminController;

use App\Addition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Addition::where('user_id', auth()->user()->id)->get();
        return view('admin.additions.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.additions.create');
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
            'name'     => 'required',
            'name_ar'  => 'required',
            'type'     => 'required',
            'price'    => 'sometimes',
        ]);
        $res = $request->user();
        $res->additions()->create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'type' => $request->type,
            'price' => $request->price == null ? 0 : $request->price,
        ]);
        flash('تمت الاضافة بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function show(Addition $addition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function edit(Addition $addition)
    {
        return view('admin.additions.edit', compact('addition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addition $addition)
    {
        $this->validate($request, [
            'name'    => 'required',
            'name_ar' => 'required',
            'price'   => 'required',
            'type'    => 'required',
        ]);
        $addition->update($request->all());
        flash('تم التعديل بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addition = Addition::find($id);
        $addition->delete();
        flash('تم الحدف بنجاح');
        return back();
    }
}
