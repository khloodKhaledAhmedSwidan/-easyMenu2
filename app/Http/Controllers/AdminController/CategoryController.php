<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Category::where('user_id', auth()->user()->id)->get();
        return view('admin.categories.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required',
            'name_ar' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000',
        ]);
        $res = $request->user();
        $res->categories()->create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'image' => UploadImage($request->image, 'categories', 'uploads/categories')
        ]);

        flash('تم اضافة التصنيف بنجاح')->success();
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
        $cat = Category::findOrFail($id);
        return view('admin.categories.edit', compact('cat'));
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
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'name_ar' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:3000',
        ]);
        $res = $request->user();
        $record = Category::findOrFail($id);
        $record->update($request->except('image'));
        if ($request->image != null) {
            $oldImage = $record->image;
            $record->update([
                'image' => UploadImageEdit($request->image, 'categories', 'uploads/categories', $oldImage)
            ]);
        }
        flash('تم تعديل التصنيف بنجاح')->success();
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
        $record = Category::findOrFail($id);
        $image = $record->image;
        $record->delete();
        if (file_exists(public_path('uploads/categories' . $image))) {
            unlink(public_path('uploads/categories' . $image));
        }
        flash('تم حذف التصنيف بنجاح')->success();
        return back();
    }
}
