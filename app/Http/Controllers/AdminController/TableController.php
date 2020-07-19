<?php

namespace App\Http\Controllers\AdminController;

use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $records = Table::where('user_id',$id)->get();
        return view('admin.tables.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = auth()->user()->restaurantBranches()->pluck('name','id');
        return view('admin.tables.create', compact('branches'));
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
        $this->validate($request,[
            'name' => 'required',
            'branch_id' => 'required',
        ]);
        $id = auth()->user()->id;
        $table = Table::create($request->all());
        $table->user_id = $id;
        $table->save();
        flash('تم اضافة الطاولة بنجاح')->success();
        return redirect()->route('tables.index');
        // dd($table);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = auth()->user()->restaurantBranches()->pluck('name','id');
        $table = Table::find($id);
        return view('admin.tables.edit',compact('table','branches'));
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
        $this->validate($request,[
            'name' => 'required',
            'branch_id' => 'required',
        ]);
        // $id = auth()->user()->id;
        $table = Table::find($id);
        $table->update($request->all());
        // $table->user_id = $id;
        // $table->save();
        flash('تم تعديل الطاولة بنجاح')->success();
        return redirect()->route('tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::find($id);
        $table->delete();
        flash('تم حذف الطاولة ');
        return back();
    }
}
