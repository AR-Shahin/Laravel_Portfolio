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

    public function seenMailL(Request $request){
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
        $cat = Contact::whereIn('id',$request->id);
        if($cat->delete()){
            return response()->json([
                'message' => 'Data deleted successfully!'
            ]);
        }
    }

    public function countNewMail(){
        return response()->json([
            'data' => Contact::where('status',0)->count()
        ]);
    }

    public function store(Request $request){
        $create = Contact::create($request->only(['name','email','subject','text']));
        if($create){
            return response()->json([
                'status' => 200,
                'data' => 'Thanks! "' .$request->name . '" For contact with us.'
            ]);
        }
    }

    public function getLatestMailForNav(){

    }


    public function seenMail(Request $request)
    {
        $update = Contact::whereIn('id',$request->input('id'))->update([
            'status' => 1
        ]);
        if ($update) {
            return response()->json([
                'status' => 200,
                'flag' => 'SEEN'
            ]);
        }
    }
}
