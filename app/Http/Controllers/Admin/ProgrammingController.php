<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Programming;
use Illuminate\Http\Request;
use function response;
use function view;

class ProgrammingController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Project';
    }
    public function index(){
        $this->data['sub_menu'] = 'Programming';
        return view('backend.programming.index',$this->data);
    }

    public function getAllProgrammingCode(){
        return response([
            'data' => Programming::latest()->get()
        ]);
    }

    public function store(Request $request){
        $insert = Programming::create($request->all());
        if($insert){
            return response()->json([
                'flag' => 'INSERT',
                'message' =>'Data save successfully!'
            ]);
        }
    }

    public function destroy(Request $request){
        $delete = Programming::find($request->input('id'))->delete();
        if($delete){
            return response()->json([
                'flag' => 'DELETE',
                'message' =>'Data save successfully!'
            ]);
        }
    }

    public function edit(Request $request){
        return response()->json([
            'data' => Programming::find($request->input('id'))
        ]);
    }

    public function update(Request $request){
        $update = Programming::find($request->input('id'))->update($request->all());
        if($update){
            return response()->json([
                'flag' => 'UPDATE',
                'message' =>'Data Update successfully!'
            ]);
        }
    }
}
