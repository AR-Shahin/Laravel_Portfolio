<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\SocialLink;
use Illuminate\Http\Request;
use function view;

class SocialLinksController extends Controller
{
    public function index(){
        $this->data['data'] = SocialLink::latest()->first();
        return view('backend.site.links',$this->data);
    }

    public function store(Request $request){

        $create = new SocialLink();
        $create->facebook = $request->input('facebook');
        $create->twitter = $request->input('twitter');
        $create->instagram = $request->input('instagram');
        $create->linkedin = $request->input('linkedin');
        $create->youtube = $request->input('youtube');
        $create->github = $request->input('github');

        if($create->save()){
            return response()->json([
                'status' => 200,
                'message' => 'Data Save Successfully!',
                'flag' => 'INSERT',
                'data' => $create->id
            ]);
        }
    }

    public function update(Request $request){
        $update = SocialLink::find($request->id)->update($request->all());
        if($update){
            return response()->json([
                'status' => 200,
                'message' => 'Data Updated Successfully!',
                'flag' => 'UPDATED'
            ]);
        }
    }

    public function fetchSocialLinks(){
        return response()->json([
            'status' => 200,
            'data' =>SocialLink::latest()->first()
        ]);
    }
}
