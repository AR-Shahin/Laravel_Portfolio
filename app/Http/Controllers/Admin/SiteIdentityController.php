<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteIdentity;
use function dd;
use function file_exists;
use Illuminate\Http\Request;
use function response;
use function strtolower;
use function unlink;
use function view;

class SiteIdentityController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Site';
    }
    public function index(){
        $this->data['sub_menu'] = 'Site_identity';
        $this->data['data'] = SiteIdentity::latest()->first();
        return view('backend.site.site_identity',$this->data);
    }
    public function fetchSiteIdentity(){
        return response()->json([
            'status' => 200,
            'data' =>SiteIdentity::latest()->first()
        ]);
    }

    public function store(Request $request){
        if($request->has('logo')){
            $image = $request->file('logo');
            $ext = $image->extension();
            if(strtolower($ext) != 'png'){
                return response()->json([
                    'flag' =>'EXT_NOT_MATCH',
                    'message' => 'Extension Should be PNG!'
                ]);
            }else{
                $name =  hexdec(uniqid()) . '.' .$ext;
                $path = 'uploads/site/';
                $last_image = $path.$name;
                $create = new SiteIdentity();
                $create->logo = $last_image;
                $create->phone = $request->input('phone');
                $create->email = $request->input('email');
                $create->address = $request->input('address');
                $create->resume = $request->input('resume');
                if($create->save()){
                    $image->move($path,$last_image);
                    return response()->json([
                        'flag' =>'INSERT',
                        'message' => 'Data save Successfully!',
                        'data' => $create->id
                    ]);
                }
            }
        }
        return 0;
    }

    public function update(Request $request){
        $ob = SiteIdentity::latest()->first();
        $old_img = $ob->logo;
        if($request->hasFile('e_logo')){
            $image = $request->file('e_logo');
            $ext = $image->extension();
            if(strtolower($ext) != 'png'){
                return response()->json([
                    'flag' =>'EXT_NOT_MATCH',
                    'message' => 'Extension Should be PNG!'
                ]);
            }else{
                $name =  hexdec(uniqid()) . '.' .$ext;
                $path = 'uploads/site/';
                $last_image = $path.$name;
                $create =  SiteIdentity::find($request->id);
                $create->logo = $last_image;
                $create->phone = $request->input('phone');
                $create->email = $request->input('email');
                $create->address = $request->input('address');
                $create->resume = $request->input('resume');
                if($create->save()){
                    if(file_exists($old_img)){
                        unlink($old_img);
                    }
                    $image->move($path,$last_image);
                    return response()->json([
                        'flag' =>'UPDATE',
                        'message' => 'Data save Successfully!',
                        'id' => $create->id,
                        'data' => SiteIdentity::find($request->id),
                    ]);
                }
            }
        }
        else{
            $create =  SiteIdentity::find($request->id);
            $create->phone = $request->input('phone');
            $create->email = $request->input('email');
            $create->address = $request->input('address');
            $create->resume = $request->input('resume');
            if($create->save()){
                return response()->json([
                    'flag' =>'UPDATE',
                    'message' => 'Data save Successfully!',
                    'id' => $create->id,
                    'data' => SiteIdentity::find($request->id),
                ]);
            }
        }
    }
}
