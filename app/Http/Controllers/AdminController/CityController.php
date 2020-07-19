<?php

namespace App\Http\Controllers\AdminController;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = auth()->user()->cities;
        // dd($records);
        return view('admin.cities.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
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
            'name' => 'required'
        ]);
        auth()->user()->cities()->create($request->all());
        flash('تم اضافة المدينة بنجاح')->success();
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        auth()->user()->cities()->where('id',$city->id)->update(['name' => $request->name]);
        flash('تم تعديل المدينة بنجاح')->success();
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        // $check = $city->users == null ? 0 : $city->users;
        // dd($check);
        // if ($check->count() > 0) {
        //     flash('لا يمكن حذف هذه المدينه لان بها مستخدمين')->error();
        //     return back();
        // }
        $city->delete();
        flash('تم حذف المدينة بنجاح')->success();
        return back();
    }
}
