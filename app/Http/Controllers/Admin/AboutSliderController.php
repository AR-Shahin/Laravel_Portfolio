<?php

namespace App\Http\Controllers\Admin;

use App\AboutSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;

class AboutSliderController extends Controller
{
    private function isPermittedExtension($ext){
        $permit = ['png','jpg','jpeg'];
        if(in_array($ext,$permit)){
            return true;
        }
        return false;
    }
    public function index(){
        return view('backend.about.slider',$this->data);
    }
    public function fetchAboutSlider(){
        return response()->json([
            'status' => 200,
            'data' =>AboutSlider::latest()->get()
        ]);
    }
    public function store(Request $request){
        $image = $request->file('image');
        $ext = $image->extension();
        if(!$this->isPermittedExtension($ext)){
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
        $path = 'uploads/slider/';
        $last_image = $path.$name;
        $formData =  $request->all();
        $formData['image'] = $last_image ;
        if(AboutSlider::create($formData)){
            $image->move($path,$last_image);
            return response()->json([
                'flag' =>'INSERT',
                'message' => 'Data save Successfully!'
            ]);
        }
    }
}
