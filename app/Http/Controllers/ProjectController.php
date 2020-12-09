<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class ProjectController extends Controller
{
    public function index(){
        return view('frontend.project.index');
    }
}
