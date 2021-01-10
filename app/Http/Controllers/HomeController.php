<?php

namespace App\Http\Controllers;

use App\AboutSlider;
use App\AboutText;
use App\Gallery;
use App\Programming;
use App\Project;
use App\SiteIdentity;
use App\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       // return Project::with('category')->latest()->inRandomOrder()->take(6)->get();
        return view('frontend.home',[
            'site' => SiteIdentity::first(),
            'link' => SocialLink::first(),
            'abt_sliders' => AboutSlider::where('status',1)->latest()->get(),
            'abt_text' => AboutText::first(),
            'projects' => Project::with('category')->where('status',1)->inRandomOrder()->take(6)->get(),
            'ds_programming' =>Programming::where('type',1)->latest()->get(),
            'other_programming' =>Programming::where('type',2)->latest()->get(),
            'gallery_images' => Gallery::where('status',1)->inRandomOrder()->take(8)->get()
        ]);
    }
}
