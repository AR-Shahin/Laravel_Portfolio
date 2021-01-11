<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Project;
use function dd;
use function file_exists;
use Illuminate\Http\Request;
use function response;
use function unlink;
use function view;

class ProjectController extends Controller
{
    function __construct()
    {
        $this->data['main_menu'] = 'Project';
    }

    private function isPermittedExtension($ext){
        $permit = ['png','jpg','jpeg'];
        if(in_array($ext,$permit)){
            return true;
        }
        return false;
    }
    public function index(){
        $this->data['sub_menu'] = 'Project';
        $this->data['cats'] = Category::latest()->get();
        return view('backend.project.index',$this->data);
    }

    public function store(Request $request){
        if($request->hasFile('image') && $request->hasFile('thumb_image')){
            $image = $request->file('image');
            $thumb_image = $request->file('thumb_image');
            $ext = $image->extension();
            $Text = $thumb_image->extension();
            if(!$this->isPermittedExtension($ext)){
                return response()->json([
                    'flag' =>'IMAGE_EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }
            if(!$this->isPermittedExtension($Text)){
                return response()->json([
                    'flag' =>'THUMB_EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }

            $image_name = hexdec(uniqid()) . '.' .$ext;
            $thumb_name = hexdec(uniqid()) . '.' .$Text;
            $path = 'uploads/project/';
            $last_main_image = $path.$image_name;
            $last_thumb_image = $path.$thumb_name;
            $formData = $request->all();
            $formData['image'] = $last_main_image;
            $formData['thumb_image'] = $last_thumb_image;
            $create = Project::create($formData);
            if($create){
                $image->move($path,$last_main_image);
                $thumb_image->move($path,$last_thumb_image);
                return response()->json([
                    'flag' =>'INSERT',
                    'message' => 'Data save Successfully!'
                ]);
            }
        }
    }

    public function fetchAllProjects(){
        return response()->json([
            'status' => 200,
            'data' =>Project::with('category')->latest()->get()
        ]);
    }

    public function statusActive(Request $request){
        Project::find($request->id)->update([
            'status' => 1,
        ]);
        return response()->json([
            'flag' =>'ACTIVE'
        ]);
    }

    public function statusInActive(Request $request){
        Project::find($request->id)->update([
            'status' => 0,
        ]);
        return response()->json([
            'flag' =>'INACTIVE'
        ]);
    }
    public function destroy(Request $request)
    {
        $ob = Project::findorFail($request->id);
        $img = $ob->image;
        $Timg = $ob->thumb_image;
        $delete = Project::find($request->id);
        if($delete->delete()){
            if(file_exists($img)){unlink($img);}
            if(file_exists($Timg)){unlink($Timg);}
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }

    public function view(Request $request){
        return response()->json([
            'status' => 200,
            'data' => Project::with('category')->findOrfail($request->id)
        ]);
    }
    public function edit(Request $request){
        return response()->json([
            'status' => 200,
            'data' => Project::with('category')->findOrfail($request->id)
        ]);
    }
    public function update(Request $request){
        if($request->hasFile('image') && $request->hasFile('thumb_image')){
            $image = $request->file('image');
            $thumb_image = $request->file('thumb_image');
            $ext = $image->extension();
            $Text = $thumb_image->extension();
            if(!$this->isPermittedExtension($ext)){
                return response()->json([
                    'flag' =>'IMAGE_EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }
            if(!$this->isPermittedExtension($Text)){
                return response()->json([
                    'flag' =>'THUMB_EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }

            $image_name = hexdec(uniqid()) . '.' .$ext;
            $thumb_name = hexdec(uniqid()) . '.' .$Text;
            $path = 'uploads/project/';
            $last_main_image = $path.$image_name;
            $last_thumb_image = $path.$thumb_name;
            $formData = $request->except(['old_image','old_thumb_image','id']);
            $formData['image'] = $last_main_image;
            $formData['thumb_image'] = $last_thumb_image;
            $update = Project::findOrfail($request->id)->update($formData);
            if($update){
                $image->move($path,$last_main_image);
                $thumb_image->move($path,$last_thumb_image);
                if(file_exists($request->old_image)){unlink($request->old_image);}
                if(file_exists($request->old_thumb_image)){unlink($request->old_thumb_image);}
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data Update Successfully!'
                ]);
            }
        }else if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->extension();
            if(!$this->isPermittedExtension($ext)){
                return response()->json([
                    'flag' =>'IMAGE_EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }
            $image_name = hexdec(uniqid()) . '.' .$ext;
            $path = 'uploads/project/';
            $last_main_image = $path.$image_name;
            $formData = $request->except(['old_image','old_thumb_image','id']);
            $formData['image'] = $last_main_image;
            $update = Project::findOrfail($request->id)->update($formData);
            if($update){
                $image->move($path,$last_main_image);
                if(file_exists($request->old_image)){unlink($request->old_image);}
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data Update Successfully!'
                ]);
            }
        }else if($request->hasFile('thumb_image')){
            $thumb_image = $request->file('thumb_image');
            $Text = $thumb_image->extension();
            if(!$this->isPermittedExtension($Text)){
                return response()->json([
                    'flag' =>'THUMB_EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }
            $thumb_name = hexdec(uniqid()) . '.' .$Text;
            $path = 'uploads/project/';
            $last_thumb_image = $path.$thumb_name;
            $formData = $request->except(['old_image','old_thumb_image','id']);
            $formData['thumb_image'] = $last_thumb_image;
            $update = Project::findOrfail($request->id)->update($formData);
            if($update){
                $thumb_image->move($path,$last_thumb_image);
                if(file_exists($request->old_thumb_image)){unlink($request->old_thumb_image);}
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data Update Successfully!'
                ]);
            }
        }else{
            $formData = $request->except(['old_image','old_thumb_image','id']);
            $update = Project::findOrfail($request->id)->update($formData);
            if($update){
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data Update Successfully!'
                ]);
            }
        }
    }
}
