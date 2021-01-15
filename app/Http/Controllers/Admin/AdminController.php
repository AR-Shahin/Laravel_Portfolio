<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;

class AdminController extends Controller
{
    public function index()
    {
        $this->data['main_menu'] = 'Dashboard';
        $this->data['sub_menu'] = '';
        return view('backend.dashboard',$this->data);
    }

    public function adminIndex(){
        $this->data['main_menu'] = 'Admin';
        $this->data['sub_menu'] = 'Manage_Admin';
        return view('backend.admin.index',$this->data);
    }
}
