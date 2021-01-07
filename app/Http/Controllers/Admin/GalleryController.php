<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use function dd;
use Illuminate\Http\Request;
use function view;

class GalleryController extends Controller
{
    private function isPermittedExtension($ext){
        $permit = ['png','jpg','jpeg'];
        if(in_array($ext,$permit)){
            return true;
        }
        return false;
    }
    public function index(){
        return view('backend.gallery.index');
    }
    public function fetchGalleryPhoto(){
        return response()->json([
            'status' => 200,
            'data' =>Gallery::latest()->get()
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
        $path = 'uploads/gallery/';
        $last_image = $path.$name;
        $formData =  $request->all();
        $formData['image'] = $last_image ;
        if(Gallery::create($formData)){
            $image->move($path,$last_image);
            return response()->json([
                'flag' =>'INSERT',
                'message' => 'Data save Successfully!'
            ]);
        }
    }

    public function statusActive(Request $request){
        Gallery::find($request->id)->update([
            'status' => 1,
        ]);
        return response()->json([
            'flag' =>'ACTIVE'
        ]);
    }

    public function statusInActive(Request $request){
        Gallery::find($request->id)->update([
            'status' => 0,
        ]);
        return response()->json([
            'flag' =>'INACTIVE'
        ]);
    }
    public function destroy(Request $request)
    {
        $ob = Gallery::findorFail($request->id);
        $img = $ob->image;
        $admin = Gallery::find($request->id);
        if($admin->delete()){
            if(file_exists($img)){unlink($img);}
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }

    public function edit(Request $request){
        return response()->json([
            'data' => Gallery::find($request->id)
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
        }else{
            dd(3);
        }
    }

}
