<?php

namespace App\Http\Controllers\AdminController;

use App\Branch;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::where('restaurant_id', auth()->user()->id)->get();
        $branchs = auth()->user()->restaurantBranches;
        $package = auth()->user()->subscriptions()->where('status',1)->where('finished',0)->first();
        $pack = $package == null ? false : $package->package_id == 2 ? true : false; 
        // dd($pack);
        return view('admin.branches.index', compact('records', 'branchs','pack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branchs = auth()->user()->branchs;
        $created = auth()->user()->branches()->count();
        
        // dd($branchs,$created);
        if ($created < $branchs) {

            return view('admin.branches.create');
        } else {
            flash('لقد اضفت الحد الاقصي من الفروع')->error();
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $rules = [
            'phone_number' => 'required',
            'email' => 'required|unique:users',
            'name' => 'required|unique:users',
            'name_ar' => 'required|unique:users',
            'city_id'=>'required',
            'password'=>'required|confirmed',

        ];
        $this->validate($request, $rules);
        $res = auth()->user()->id;
        User::create([
        'phone_number' => $request->phone_number,
        'email' => $request->email,
        'name' => $request->name,
        'name_ar' =>$request->name_ar,
        'city_id' => $request->city_id,
        'type' => 1 ,
        'restaurant_id' => $res,
        'password' => bcrypt($request->password),
        ]);

        flash('تم اضافة الفرع');
        return redirect()->route('branches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  $branch = User::find($id);
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $branch)
    {
        // dd($branch);
        //'email' => 'unique:table,email_column_to_check,id_to_ignore'
        $this->validate($request,[
            'phone_number' => 'required',
            'email' => 'email|unique:users,email,'.$branch->id,
            'name' => 'required|unique:users,id,'.$branch->id,
            'name_ar' => 'required|unique:users,id,'.$branch->id,
            'city_id'=>'required',
            'password'=>'nullable|confirmed',
        ] );
        $res = auth()->user();
        $branch->update($request->except('password'));
        $branch->type = 1 ;
        if($request->password != null){
            $branch->password = bcrypt($request->password);
        }
        $branch->save();
        flash('تم تعديل الفرع');
        return redirect()->route('branches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //   dd($id);
        $branch = User::find($id);
        $branch->delete();
        flash('تم الحذف بنجاح');
        return back();
    }
}
