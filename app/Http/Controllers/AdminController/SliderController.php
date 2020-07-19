<?php

namespace App\Http\Controllers\AdminController;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = auth()->user();
        $records = $res->sliders;
        return view('admin.sliders.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['image' => 'required|mimes:jpeg,jpg,png']);
        Slider::create([
            'restaurant_id' => $request->user()->id,
            'image' => UploadImage($request->image, 'slider', 'uploads/sliders')
        ]);
        flash('تم اضافة الصورة بنجاح');
        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, ['image' => 'nullable|mimes:jpeg,jpg,png']);
        $slider->update([
            'image' => $request->image == null ? $slider->image : UploadImageEdit($request->image, 'slider', 'uploads/sliders', $slider->image)
        ]);
        flash('تم تعديل الصورة بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $image = $slider->image;
        $slider->delete();
        if (file_exists(public_path('uploads/sliders/' . $image))) {
            unlink(public_path('uploads/sliders/' . $image));
        }
        flash('تم الحذف بنجاح');
        return back();
    }
}
