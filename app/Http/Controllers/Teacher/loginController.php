<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class loginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = "/teacher";

    public function __construct()
    {
        $this->middleware('guest:teacher,/teacher')->except('logout');
    }

    public function index (){

         return view('teacher.login');

    }
    protected function guard()
    {
        return \Auth::guard("teacher");
    }

}
