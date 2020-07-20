<?php

namespace App\Http\Controllers\Auth;

use App\Package;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'package_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $package =$data['package_id'];
        $packageDuration =Package::find($package)->duration;
        $now =Carbon::now('m');
        $end=   $now->addMonths($packageDuration);

        $user =  User::create([
            'name' => $data['name'],
            'name_ar' => $data['name_ar'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'active' => '0',
            // 'image' => $data['image'] == null ? null : UploadImage($data['image'], 'image', '/uploads/users'),
        ]);
        $status = $package == 1 ? 1 : 0;
        $user->subscriptions()->create(
            [
                'package_id' => $package,
                'status' => $status,
                'end_at' => $end,
            ]);

        return $user;
//         flash('تم التسجيل بنجاح');
//         return redirect()->route('pay.bankPage',$user->id);

    }
}
