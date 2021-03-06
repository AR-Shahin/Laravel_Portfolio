<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use function dd;
use function explode;
use function file_exists;
use Illuminate\Http\Request;
use function unlink;
use function view;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Site';
    }
    private function isPermittedExtension($ext){
        $permit = ['png','jpg','jpeg'];
        if(in_array($ext,$permit)){
            return true;
        }
        return false;
    }
    public function index(){
        $this->data['sub_menu'] = 'Gallery';
        return view('backend.gallery.index',$this->data);
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
       // dd($request->all());
        if($request->has('name')){
            $update = Gallery::find($request->id)->update([
                'title' => $request->name
            ]);
            if($update){
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data deleted successfully!'
                ]);
            }
        }else{
           // dd($request->file('image'));
            $image = $request->file('image');
            $ext = $image->extension();
            if(!$this->isPermittedExtension($ext)){
                return response()->json([
                    'flag' =>'EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }
            $name =  hexdec(uniqid()) . '.' .$ext;
            $path = 'uploads/gallery/';
            $last_image = $path.$name;
            $update = Gallery::find($request->id)->update([
                'title' => $request->title,
                'image' => $last_image
            ]);
            if($update){
                if(file_exists($request->old_image)){
                    unlink($request->old_image);
                }
                $image->move($path,$last_image);
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data deleted successfully!'
                ]);
            }
        }
    }
}
