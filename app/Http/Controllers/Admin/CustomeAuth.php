<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomeAuth extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = "/Admin";

    public function __construct()
    {
        $this->middleware('guest:admin,/Admin')->except('logout');
    }

    public function index (){

         return view('admin.login');

    }
    protected function guard()
    {
        return \Auth::guard("admin");
    }

    // public function create(Request $request){
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);
    //         if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
    //             return redirect()->intended('/Admin');
    //         }
    //     return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'this']);
    // }
}
