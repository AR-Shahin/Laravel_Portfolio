<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use function dd;
use Illuminate\Http\Request;
use function isPermittedExtension;
use function view;

class AdminController extends Controller
{
    public function index()
    {
        $this->data['main_menu'] = 'Dashboard';
        $this->data['sub_menu'] = '';
        return view('backend.dashboard',$this->data);
    }

    public function adminIndex(){
        $this->data['main_menu'] = 'Admin';
        $this->data['sub_menu'] = 'Manage_Admin';
        return view('backend.admin.index',$this->data);
    }

    public function store(Request $request){
        $email = Admin::where('email',$request->input('email'))->first();
        if($email){
            return response()->json([
                'flag' =>'EMAIL_EXISTS',
                'message' => 'Email Already taken!'
            ]);
        }
        $image = $request->file('image');
        $ext = $image->extension();
        if(!isPermittedExtension($ext)){
            return response()->json([
                'flag' =>'EXT_NOT_MATCH',
                'message' => 'Extension Should be jpg,png,jpeg!'
            ]);
        }
        if(filesize($request->image)>=2000000){
            return response()->json([
                'flag' =>'BIG_SIZE',
                'message' => 'Image Size Should be smaller than 2MB!'
            ]);
        }
        $name =  hexdec(uniqid()) . '.' .$ext;
        $path = 'uploads/admin/';
        $last_image = $path.$name;
        $formData =  $request->except(['token']);
        $formData['image'] = $last_image ;
        if(Admin::create($formData)){
            $image->move($path,$last_image);
            return response()->json([
                'flag' =>'INSERT',
                'message' => 'Data save Successfully!'
            ]);
        }
    }
}
