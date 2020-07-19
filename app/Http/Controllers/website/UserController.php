<?php

namespace App\Http\Controllers\website;

use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function store(Request $request)
    {
        $this->validate($request, [
            'phone_number'          => 'required|unique:users',
            'email'                 => 'required|unique:users',
            'name'                  => 'required|max:255',
            'image'                 => 'nullable|mimes:jpeg,bmp,png,jpg|max:5000',
            'password'              => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
            'active'                => 'required',
        ]);

        // end certificate_image
        $user= User::create([
            'phone_number'    => $request->phone_number,
            'email'           => $request->email,
            'name'            => $request->name,
            'active'          => $request->active,
            'password'        => Hash::make($request->password),
            'image'           => $request->file('image') == null ? null : UploadImage($request->file('image'), 'image', '/uploads/users'),
        ]);

        return redirect('admin/users');
    }

}
