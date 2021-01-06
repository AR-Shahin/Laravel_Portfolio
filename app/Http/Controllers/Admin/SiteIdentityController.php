<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteIdentity;
use Illuminate\Http\Request;
use function strtolower;
use function view;

class SiteIdentityController extends Controller
{
    public function index(){
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
        if($request->input('logo')){
            return $request->file('logo');
        }else{
            return 2;
        }
    }
}