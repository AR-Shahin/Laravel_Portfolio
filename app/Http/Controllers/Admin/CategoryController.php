<?php

namespace App\Http\Controllers\Admin;

use function abort;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function json_decode;
use function response;
use function view;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('backend.category.index',$this->data);
    }

    public function getAllCategory(Request $request){
        return response([
            'data' => Category::latest()->get()
        ]);
    }

    public function destroy(Request $request)
    {
        $cat = Category::find($request->id);
        if($cat->delete()){
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }

    public function store(Request $request){
        if($request->has('name')){
            $cat = Category::where('name',$request->input('name'))->first();
            if($cat){
                return response()->json([
                    'flag' => 'EXIST',
                    'message' => 'Data already exits!'
                ]);
            }else{
                $create = Category::create([
                    'name' => $request->input('name'),
                    'slug' => Str::slug($request->input('name'),'-')
                ]);
                if($create){
                    return response()->json([
                        'flag' => 'INSERT',
                        'message' => 'Data save successfully!'
                    ]);
                }
            }
        }



    }

    public function makeActive(Request $request){
        $cat = Category::find($request->id)->update([
            'status' => 1
        ]);
        return response()->json('SUCCESS');
    }

    public function makeInactive(Request $request){
        $cat = Category::find($request->id)->update([
            'status' => 0
        ]);
        return response()->json('SUCCESS');
    }

    public function edit(Request $request){
        $cat = Category::find($request->id);
        return response()->json($cat);
    }

    public function update(Request $request){
        $cat = Category::where('name',$request->name)->first();
        if($cat){
            return response()->json([
                'message' => 'EXIST'
            ]);
        }else{
            $cat = Category::find($request->id);
            $cat->name = ucwords($request->name);
            $cat->slug = Str::slug($request->name,'-');
            if($cat->save()){
                return response()->json([
                    'message' => 'Data Updated successfully!',
                    'flag' => 'UPDATE',
                ]);
            }
        }
    }
}

