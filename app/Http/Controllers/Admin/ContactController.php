<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function response;

class ContactController extends Controller
{
    public function index(){
        $this->data['sub_menu'] = 'Contact';
        $this->data['main_menu'] = 'Contact';
        return view('backend.contact.index',$this->data);
    }
    public function fetchContact(){
        return response()->json([
            'status' => 200,
            'data' =>Contact::latest()->get()
        ]);
    }

    public function seenMail(Request $request){
        $update = Contact::find($request->input('id'))->update([
            'status' => 1
        ]);
        if($update){
            return response()->json([
                'status' => 200,
                'flag' =>'SEEN'
            ]);
        }
    }

    public function view(Request $request){
        return response()->json([
            'status' => 200,
            'data' =>Contact::find($request->id)
        ]);
    }

    public function destroy(Request $request){
        $cat = Contact::find($request->id);
        if($cat->delete()){
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }
}
