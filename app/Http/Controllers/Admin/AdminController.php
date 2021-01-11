<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        $this->data['main_menu'] = 'Dashboard';
        $this->data['sub_menu'] = '';
        return view('backend.dashboard',$this->data);
    }
}
