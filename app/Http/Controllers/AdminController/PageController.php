<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:5000'
        ]);
        Page::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image') == null ? null : UploadImage($request->file('image'), 'image', '/uploads/pages')
        ]);
        flash('تم اضافة الصفحة بنجاح ')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
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
            'title'      => 'required',
            'content'    => 'required',
            'image'      => 'nullable|mimes:jpeg,jpg,png,gif|max:5000'
        ]);
        $page = Page::find($id);
        $page->update([
            'title'      => $request->title,
            'content'    => $request->content,
            'image'      => $request->file('image') == null ? $page->image : UploadImage($request->file('image'), 'image', '/uploads/pages')
        ]);
        flash('تم تعديل الصفحة بنجاح ')->success();
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
        $page = Page::find($id)->delete();
        if ($page->image != null) {
            unlink(public_path('images/uploads' . $page->image));
        }
        flash('تم حذف الصفحة بنجاح')->success();
        return back();
    }
}
