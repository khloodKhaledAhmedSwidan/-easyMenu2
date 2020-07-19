<?php

namespace App\Http\Controllers\AdminController;

use App\ContactInfo;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Support\Facades\Redirect;


class SettingController extends Controller
{
    /**
     * availabe banks for this site
     *
     * @return void
     */
    public function index()
    {
        $settings = Setting::all();
//        dd($settings);
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * create new bank form
     *
     * @return void
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * save new bank to db
     *
     * @param Request $request
     * @return void
     */
    public function addBank(Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required',
            'account_number' => 'required',
        ]);
        Setting::create($request->all());
        flash('تم اضافة بيانات البنك بنجاح')->success();
        return back();
    }

    /**
     * update bank information
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "bank_name"  => "required|string|max:255",
            'account_number' => 'required|numeric',
        ]);

        Setting::where('id', $request->id)->first()->update($request->all());
        flash('تم تعديل بيانات البنك بنجاح')->success();
        return Redirect::back();
    }

    /**
     * delete bank information
     *
     * @param Request $request
     * @return void
     */
    public function deleteBank(Request $request)
    {
        Setting::where('id', $request->id)->first()->delete();
        flash('تم حذف البنك بنجاح')->warning();
        return back();
    }

    /**
     * prepare the view of contacts information
     *
     * @return void
     */
    public function infoSetting()
    {
        $record = ContactInfo::first();
        return view('admin.pages.contact-info', compact('record'));
    }

    /**
     * save contact setting
     *
     * @param Request $request
     * @return void
     */
    public function postInfoSetting(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:50',
            'phone' => 'required',
            'cellphone' => 'required',
            'address' => 'required',
            'contact_info' => 'required',
            'address_en' => 'required',
            'contact_info_en' => 'required',
        ];
        $messages = [
            'email.required' => 'هذا الحقل مطلوب ادخاله',
            'email.max' => 'هذا الحقل يجب ان يقل عن 50 حرف ',
            'address.required' => 'هذا الحقل مطلوب ادخاله',
            'contact_info.required' => 'هذا الحقل مطلوب ادخاله',
            'address_en.required' => 'هذا الحقل مطلوب ادخاله',
            'contact_info_en.required' => 'هذا الحقل مطلوب ادخاله',
            'phone.required' => 'هذا الحقل مطلوب ادخاله',
            'cellphone.required' => 'هذا الحقل مطلوب ادخاله',
        ];
        $validation = $this->validate($request, $rules, $messages);

        if ($validation) {

            $record = ContactInfo::find(1);
            $record->email = $request->email;
            $record->phone = $request->phone;
            $record->cellphone = $request->cellphone;
            $record->address = $request->address;
            $record->contact_info = $request->contact_info;
            $record->address_en = $request->address_en;
            $record->contact_info_en = $request->contact_info_en;
            $record->save();

            flash('تم الحفظ بنجاح ')->success();
            return back();
        }
    }

    /**
     * prepare the view of adding social links
     *
     * @return void
     */
    public function social()
    {
        $record = Social::first();
        return view('admin.pages.social', compact('record'));
    }

    /**
     * save the socail inforamtion to db
     *
     * @param Request $request
     * @return void
     */
    public function postSocial(Request $request)
    {
        $rules = [
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'instagram' => 'required',
            'youtube' => 'nullable',
            'google_plus' => 'nullable',
        ];

        $messages = [
            'facebook.required' => 'هذا الحقل مطلوب ادخاله',
            'twitter.required' => 'هذا الحقل مطلوب ادخاله',
            'linkedin.required' => 'هذا الحقل مطلوب ادخاله',
            'instagram.required' => 'هذا الحقل مطلوب ادخاله',
        ];

        $this->validate($request, $rules, $messages);
        Social::first()->update($request->all());

        flash('تم التعديل بنجاح')->success();
        return back();
    }
}
