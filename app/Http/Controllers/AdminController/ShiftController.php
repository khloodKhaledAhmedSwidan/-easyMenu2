<?php

namespace App\Http\Controllers\AdminController;

use App\Shift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Shift::where('restaurant_id', auth()->user()->id)->get();
        return view('admin.shifts.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->user();
        $rules = [
            'name' => 'required',
            'name_ar' => 'required',
            'from' => 'required',
            'to' => 'required',
        ];
        $this->validate($request, $rules);
        $res->shifts()->create($request->all());
        flash('تم اضافة الشيفت بنجاح');
        return redirect()->route('shifts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('admin.shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $res = $request->user();
        $rules = [
            'name' => 'required',
            'name_ar' => 'required',
            'from' => 'required',
            'to' => 'required',
        ];
        $this->validate($request, $rules);
        $shift->update($request->all());
        flash('تم تعديل الشيفت بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::find($id);
        $shift->delete();
        flash('تم حذف الشيفت ');
        return back();
    }
}
