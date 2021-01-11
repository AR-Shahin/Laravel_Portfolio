<?php

namespace App\Http\Controllers\Admin;

use App\AboutSlider;
use App\Http\Controllers\Controller;
use function file_exists;
use Illuminate\Http\Request;
use function response;
use function unlink;
use function view;

class AboutSliderController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'About';
    }
    private function isPermittedExtension($ext){
        $permit = ['png','jpg','jpeg'];
        if(in_array($ext,$permit)){
            return true;
        }
        return false;
    }
    public function index(){
        $this->data['sub_menu'] = 'About_slider';
        return view('backend.about.slider',$this->data);
    }
    public function fetchAboutSlider(){
        return response()->json([
            'status' => 200,
            'data' =>AboutSlider::latest()->get()
        ]);
    }
    public function store(Request $request){
       // dd($request->all());
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

    public function statusActive(Request $request){
        AboutSlider::find($request->id)->update([
            'status' => 1,
        ]);
        return response()->json([
            'flag' =>'ACTIVE'
        ]);
    }

    public function statusInActive(Request $request){
        AboutSlider::find($request->id)->update([
            'status' => 0,
        ]);
        return response()->json([
            'flag' =>'INACTIVE'
        ]);
    }
    public function destroy(Request $request)
    {
        $ob = AboutSlider::findorFail($request->id);
        $img = $ob->image;
        $admin = AboutSlider::find($request->id);
        if($admin->delete()){
            if(file_exists($img)){unlink($img);}
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }

    public function edit(Request $request){
        return response()->json([
            'data' => AboutSlider::find($request->id)
        ]);
    }

    public function update(Request $request){
        if($request->hasFile('image')){
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
            $update = AboutSlider::findOrfail($request->id)->update($formData);
            if($update){
                $image->move($path,$last_image);
                if(file_exists($request->old_img)){
                    unlink($request->old_img);
                }
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data updated Successfully!'
                ]);
            }
        }else{
            $update = AboutSlider::findOrfail($request->id)->update($request->all());
            return response()->json([
                'flag' =>'UPDATE',
                'message' => 'Data updated Successfully!'
            ]);
        }
    }
}
