<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class S3Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('Admin:teacher,TeacherLogin');
    }

    public function ShowForm(){
        return view('teacher.upload');
    }
}
