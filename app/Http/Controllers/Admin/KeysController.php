<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\keystore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Key;
use Illuminate\Support\Facades\Validator;
use  App\Traits\PhotoTrait;

class KeysController extends Controller
{
    use PhotoTrait;
    public function __construct()
    {
        $this->middleware(['auth:admin','throttle:5,1']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = Key::get();
        return view('admin.create',compact('keys'));
    }

    public function info(keystore $request)
    {
        $keys = Key::get()->first();
        // header('Content-Type: application/json');

        // exit(json_encode($keys));
        return response()->json([
        'tp' => 'success',
        't' => 'حسناً',
        'm' => 'تم إستدعاء البيانات بنجاح',
        'b' => true,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(keystore $request)
    {

        $photo = $request->photo;
        $path = 'images';

        $Image = $this->ImgUpload($photo,$path);
        // $Image = Imgur::upload($args);
        // $Link = $Image->link();
        $key = $request->input('key');
        $create = Key::create([
        'key' => $key,
        'by' => $_SERVER['REMOTE_ADDR'],
        'photo' => $Image
        ]);
        if(!$create->exists()){
            App::abort(500, 'Error');
        }else{
            return redirect()->back()->with(['success' => 'تم تسجيل المفتاح بنجاح']);

        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check = Key::find($id);
        if(!$check){
        return redirect()->back();
        }
        $key = Key::select('id','key','by')->find($id);

        return view('admin.update',compact('key'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(keystore $request,$Keyid)
    {
        $check = Key::find($Keyid);
        if(!$check){
        return redirect()->back();
        }

        // $check->update($request->all());
        $check->update([
        'key' => $request->key

        ]);
        return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $key = Key::where('id',$id)->first();

        if(!$key)
        return redirect()->back()->withErrors(['Error' => 'لم يتم العثور على المفتاح']);


        $key->delete();

        return redirect()->route('KeysCreate')->with(['success' => 'تم حذف المفتاح بنجاح']);
    }
}
