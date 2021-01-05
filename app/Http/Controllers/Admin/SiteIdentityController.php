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
       // return $request->all();
        if($request->has('logo')){
           return $image = $request->file('logo');
            $ext = $image->extension();
            if(strtolower($ext) != 'png'){
                return response()->json([
                    'flag' =>'EXT_NOT_MATCH',
                    'message' => 'Extension Should be jpg,png,jpeg!'
                ]);
            }
        }
        return 0;
    }
}
