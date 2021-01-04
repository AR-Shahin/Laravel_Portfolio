<?php

namespace App\Http\Controllers\Admin;

use App\AboutText;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function response;

class AboutTextController extends Controller
{
    public function index(){
        $this->data['count'] = AboutText::select('id')->count();
        $this->data['data'] = AboutText::latest()->first();
        return view('backend.about.abt_txt',$this->data);
    }

    public function fetchAboutText(){
        return response()->json([
            'status' => 200,
            'data' =>AboutText::latest()->first()
        ]);
    }

    public function store(Request $request){
        $count = AboutText::select('id')->count();
        if($count != 0){
            return response()->json([
                'status' => 200,
                'message' => 'You Cant insert data!',
                'flag' => 'WARNING'
            ]);
        }
        $create = AboutText::create([
            'top_text' => $request->input('top_text'),
            'bottom_text' => $request->input('bottom_text'),
        ]);
        if($create){
            return response()->json([
                'status' => 200,
                'message' => 'Data Save Successfully!',
                'flag' => 'INSERT'
            ]);
        }
    }

    public function update(Request $request){
            $update = AboutText::find($request->input('id'))->update([
                'top_text' => $request->input('top_text'),
                'bottom_text' => $request->input('bottom_text'),
            ]);
        if($update){
            return response()->json([
                'status' => 200,
                'message' => 'Data Updated Successfully!',
                'flag' => 'UPDATED'
            ]);
        }
    }
}
