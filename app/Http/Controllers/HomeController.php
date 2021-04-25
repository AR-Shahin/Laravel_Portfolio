<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Project;
use App\AboutText;
use App\SocialLink;
use App\AboutSlider;
use App\Programming;
use App\SiteIdentity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ip = request()->ip();
        $data = Location::get($ip);
        dd($data);
        $this->insertUserIp($request->ip());
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

    protected function insertUserIp($ip){

    }
}
