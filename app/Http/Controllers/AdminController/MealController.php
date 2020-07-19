<?php

namespace App\Http\Controllers\AdminController;

use App\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Meal::where('user_id', auth()->user()->id)->get();
        return view('admin.meals.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create');
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
        $rules = [
            "name_ar"        => 'required',
            "name"           => 'required',
            "content_ar"     => 'required',
            "content"        => 'required',
            "price"          => 'required',
            "calories"       => 'required',
            "category_id"    => 'required',
            "main_additions" => 'nullable|array',
            "image"          => 'required|mimes:jpeg,jpg,png',
        ];
        $this->validate($request, $rules);
        $res = $request->user();
        $meal = $res->meals()->create($request->except('image'));
        $meal->update([
            'image' => UploadImage($request->image, 'meals', 'uploads/meals')
        ]);
        if ($request->main_additions != null) {
            $meal->additions()->sync($request->main_additions);
        }
        flash('   تم اضافة الوجبة بنجاح ( اذا كان هناك احجام للوجبة يرجي اضافتها من هنا )');
        return redirect()->route('meals.addSize', ['id' => $meal->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        $sizes = $meal->sizes;
        return view('admin.meals.show', compact('meal', 'sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        return view('admin.meals.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        // dd($request->all());
        $rules = [
            "name_ar"     => 'required',
            "name"        => 'required',
            "content_ar"  => 'required',
            "content"     => 'required',
            "price"          => 'required',
            "calories"       => 'required',
            "category_id" => 'required',
            "main_additions" => 'nullable|array',
            "image"       => 'nullable|mimes:jpeg,jpg,png',
        ];
        $this->validate($request, $rules);
        $meal->update($request->except('image'));
        if ($request->image != null) {
            $meal->update([
                'image' => UploadImageEdit($request->image, 'meals', 'uploads/meals', $meal->image)
            ]);
        }
        if ($request->main_additions != null) {
            $meal->additions()->sync($request->main_additions);
        }
        flash('تم تعديل الوجبة بنجاح');
        return redirect()->route('meals.index');
    }

    public function updateFinished(Request $request, $id)
    {
        if ($request->ajax()) {
            $meal = Meal::findOrfail($id);
            $meal->finished = !$meal->finished;
            $meal->save();
            return 'true';
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSize($meal_id)
    {
        return view('admin.meals.addBranch', compact('meal_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSize(Request $request, $meal_id)
    {
        $this->validate($request, [
            'price'    => 'required',
            'calories' => 'required',
            'size'     => 'required',
            'size_ar'  => 'required',
        ]);
        //$shop->products()->attach(1, ['products_amount' => 100, 'price' => 49.99]);
        $meal = Meal::find($meal_id);

        $meal->sizes()->create($request->all());
        flash('تم اضافة الحجم بنجاح');
        return redirect()->route('meals.show', $meal_id);
    }

    // public function editSize($id)
    // {
    //     $branch = Branch::findOrFail($id);
    //     return view('admin.shops.editBranch', compact('branch'));
    // }

    // /**
    //  * update an existing resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function updateSize(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'address' => 'required',
    //         'city_id' => 'required',
    //     ]);

    //     Branch::find($id)->update([
    //         'city_id'  => $request->city_id,
    //         'address'  => $request->address
    //     ]);
    //     flash('تم تعديل الفرع بنجاح');
    //     return back();
    // }

    public function deleteSize($meal_id, $size_id)
    {
        $meal = Meal::find($meal_id);
        $size = $meal->sizes()->where('size_id', $size_id)->first();
        $meal->sizes()->detach($size_id);
        flash('تم حذف الحجم بنجاح');
        return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->delete();
        flash('تم حذف الوجبة بنجاح');
        return back();
    }
}
