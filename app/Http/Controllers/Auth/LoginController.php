<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/landpage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

       $this->middleware('guest:admin')->except('logout');
    }

    //   public function showBranchLogin()
    // {
    //     return view('auth.login', ['url' => 'branch']);
    // }
    //   public function branchLogin(Request $request)
    // {
    //     // dd('users');
    //     $this->validate($request, [
    //         'email'   => 'required',
    //         'password' => 'required|min:6'
    //     ]);

    //     if (Auth::guard('branch')->attempt(['email' => $request->email, 'password' => $request->password])) {

    //        return redirect()->route('orders.index');

    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }

    public function logout(Request $request)
    {
        // Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
