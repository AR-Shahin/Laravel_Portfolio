<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TodoList;
use function dd;
use Illuminate\Http\Request;
use function response;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index(){
        $this->data['main_menu'] = 'Admin';
        $this->data['sub_menu'] = 'TODO';
        return view('backend.todo.index',$this->data);
    }
    public function store(Request $request){
        $formData = $request->only(['title','text']);
        $formData['admin_id'] = Auth::guard('web')->user()->id;
       $insert = TodoList::create($formData);
       if($insert){
           return response()->json([
               'flag' =>"INSERT",
               'message' => "Data save successfully!"
           ]);
       }
    }
    public function fetchTodo(){
        return response([
            'data' => TodoList::with('admin')->latest()->get()
        ]);
    }

    public function destroy(Request $request){

        $cat = TodoList::find($request->id);
        if($cat->delete()){
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }

    public function view(Request $request){
        return response()->json([
            'status' => 200,
            'data' =>TodoList::find($request->id)
        ]);
    }
}
