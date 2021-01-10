<?php

namespace App\Http\Controllers;

use function abort;
use App\Category;
use App\Project;
use Illuminate\Http\Request;
use function view;
use App\SiteIdentity;
use App\SocialLink;

class ProjectController extends Controller
{
    public function index(){
        return view('frontend.project.index',[
            'flag' => '*',
            'site' => SiteIdentity::first(),
            'link' => SocialLink::first(),
            'categories' => Category::has('projects')->get(),
            'projects' => Project::with('category')->where('status',1)->latest()->get()
        ]);
    }

    public function categoryWiseProject($slug){
        $id = Category::select('id')->where('slug',$slug)->first();
        if(!$id){
            return abort(404);
        }
        return view('frontend.project.index',[
            'flag' => $slug,
            'site' => SiteIdentity::first(),
            'link' => SocialLink::first(),
            'categories' => Category::has('projects')->get(),
            'projects' => Project::with('category')->where('status',1)->where('category_id',$id->id)->latest()->get()
        ]);
    }
}
