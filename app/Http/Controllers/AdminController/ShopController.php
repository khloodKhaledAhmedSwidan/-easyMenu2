<?php

namespace App\Http\Controllers\AdminController;

use App\Branch;
use App\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Cafe::get();
        return view('admin.shops.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shops.create');
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
        ]);
        $cafe = Cafe::create($request->except('cities_id'));
        flash('تم اضافة ' . $request->name . ' بنجاح');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addBranch($shop_id)
    {
        return view('admin.shops.addBranch', compact('shop_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBranch(Request $request, $shop_id)
    {
        $this->validate($request, [
            'address' => 'required',
            'city_id' => 'required',
        ]);

        Branch::create([
            'cafe_id'  => $shop_id,
            'city_id'  => $request->city_id,
            'address'  => $request->address
        ]);
        flash('تم اضافة الفرع بنجاح');
        return back();
    }

    public function editBranch($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.shops.editBranch', compact('branch'));
    }

    /**
     * update an existing resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateBranch(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required',
            'city_id' => 'required',
        ]);

        Branch::find($id)->update([
            'city_id'  => $request->city_id,
            'address'  => $request->address
        ]);
        flash('تم تعديل الفرع بنجاح');
        return back();
    }
    
    public function deleteBranch($branch_id)
    {
        $branch = Branch::find($branch_id);
        $branch->delete();
        flash('تم حذف الفرع بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Cafe::find($id);
        $branches = Branch::where('cafe_id', $id)->get();
        // dd($shop->branches);
        return view('admin.shops.show', compact('shop', 'branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Cafe::find($id);
        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required',
            // 'cities_id' => 'required|array'
        ]);
        $cafe = Cafe::find($id);
        $cafe->update($request->except('cities_id'));
        // $cafe->cities()->sync($request->cities_id);
        flash('تم تعديل ' . $request->name . ' بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Cafe::find($id);
        $shop->delete();
        flash('تم حذف المحل');
        return back();
    }
}
