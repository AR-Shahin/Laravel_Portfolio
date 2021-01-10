@extends('layouts.front_master')
@section('title','Projects')
@section('main_content')
    <style>
        body{
            background: rgba(248, 239, 186, 0.25);
        }
        .card{
            -webkit-transition: .6s;
            -moz-transition: .6s;
            -ms-transition: .6s;
            -o-transition: .6s;
            transition: .6s;
        }
        .card:hover{
            border:1px solid #c0392b;
        }
        img{
            -webkit-transition: .6s;
            -moz-transition: .6s;
            -ms-transition: .6s;
            -o-transition: .6s;
            transition: .6s;
        }
        .card:hover img{
            transform: scale(0.95);
        }
        .img_box ul {
            display: flex;
            margin-top:10px;
            justify-content: center;
        }
        .img_box ul li {
            height:40px;
            width:40px;
            margin: 0 8px;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
            transition: .6s;
        }
        .img_box ul li i{
            font-size: 20px;
            padding:9px;
            color: #fff;
        }
        .img_box ul li.youtube{
            background: #c0392b;
        }
        .img_box ul li.git{
            background: #09b83e;
        }
        .img_box ul li.eye{
            background: #0077B5;
        }
        .img_box ul li:hover{
            transform: scale(.9);
        }
    </style>
    <div class="container mt-5 pt-5">
        <div class="row text-center">
            <div class="col-12">
                <div class="sec_title wow animate__animated animate__zoomIn">
                    <h2 class="mb-0 pb-1">My Projects</h2>
                    <p class="m-0 p-0">What i will serve for you!</p>
                </div>
            </div>
        </div>
        <div class="row text-center my-4" id="projects">
            <div class="col-12">
                <div class="btn-group" role="group" aria-label="Second group">
                    <a href="{{route('projects.index')}}" class="btn btn-info @if($flag == '*') active @endif">All</a>
                    @foreach($categories as $category)
                        <a href="{{route('category-wise-project',['slug' => $category->slug])}}" class="btn btn-info @if($flag == $category->slug) active @endif ">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            @forelse($projects as $project)
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="project_box">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center">
                                    <a href="{{asset($project->thumb_image)}}" class="popup"><img src="{{asset($project->image)}}" alt="{{$project->title}}" class="img-fluid" title="{{$project->title}}"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">{{$project->category->name}}</i></h6>
                                        <h5>{{$project->title}}</h5>

                                        <ul>
                                            <a href="{{$project->youtube}}"><li class="youtube"><i class="fa fa-youtube"></i></li></a>
                                            <a href="{{$project->github}}"><li class="git"><i class="fa fa-github"></i></li></a>
                                            <a href="{{$project->live}}"><li class="eye"><i class="fa fa-eye"></i></li></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>


@endsection
