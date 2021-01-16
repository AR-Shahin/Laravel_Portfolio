<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
