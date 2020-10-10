<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Key;
use stdClass;

class LoginController extends Controller
{
    public function ShowInfo(){
        // $obj = new \stdClass();
        // $obj -> name = 'Omar';
        // $obj -> Age = 20;
        $obj = ['name'=> 'Omar', 'Age' => 20];
        // return view('admin')->with('obj',$obj);
        $keys = Key::pluck('id', 'key')->toArray();

        return view('welcome')->with(compact('keys'));
    }
    public function store(){
        Key::create([
            'key' => 'gg',
            'by' => 'omar'
        ]);
    }
}
