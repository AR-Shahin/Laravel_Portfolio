@extends('layouts.front_master')
@section('title','Home')
@section('main_content')

    <div class="scroll-top"><a href="#hero-section"><i class="fas fa-angle-double-up"></i></a></div><!-- scrolTop -->

    <!-- hero-section -->
    <div id="particles-js"></div>
    <div id="hero-section">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 align-self-center">
                        <div class="hero-text">
                            <span class="intro wow animate__animated animate__fadeInTopLeft" style="display: inline-block">Hello, I'm</span>
                            <h1 class="wow animate__animated animate__backInUp">Anisur Rahman Shahin</h1>
                            <div class="tagline">
                                <div class="cd-intro">
                                    <h6 class="cd-headline letters rotate-2">
                                                <span class="cd-words-wrapper text-left">
                                                    <b class="is-visible">Web Developer</b>
                                                    <b>GraphicDesigner</b>
                                                    <b>Photographer</b>

                                                </span>
                                    </h6>
                                </div> </div>        <!--   <h6 style="font-size: 18px;m-0;p-0"><i>Web Designer</i></h6> -->
                            <div class="hero-social-media wow animate__animated animate__pulse" >
                                <ul>
                                    <li><a href="@if($link){{$link->facebook}} @endif" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="@if($link){{$link->twitter}} @endif" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="@if($link){{$link->github}} @endif" target="_blank"><i class="fab fa-github"></i></a></li>
                                    <li><a href="@if($link){{$link->youtube}} @endif" target="_blank"><i class="fab fa-stack-overflow"></i></a></li>
                                    <li><a href="@if($link){{$link->linkedin}} @endif" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <img src="{{asset('frontend')}}/resources/images/hero.png" alt="" class="img-fluid" style=" animation-name: HERO_ANIMATION;
                                                                                                     animation-duration: 5s; animation-iteration-count: infinite;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero-section -->
    <hr>
    <!-- about section -->
    <section id="about_section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 align-self-center">
                    <div class="myImage_slider">
                        <div class="owl-carousel about_slider">
                            @forelse($abt_sliders as $abt_slider)
                                <div class="single-slider-image">
                                    <div class="img-box">
                                        <img src="{{$abt_slider->image}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="pos_content">
                                        <span>{{$abt_slider->title}}</span>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="heading wow animate__animated animate__zoomIn">
                        <h2 class="mb-0 pb-1">About Me</h2>
                        <p class="m-0 p-0">My Introduction</p>
                    </div>
                    <div class="tab_buttons border-1">
                        <div class="row">
                            <div class="col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Skills</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="tab_contents">
                        <div class="row">
                            <div class="col-12">
                                <!-- Profile -->
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="card">
                                            <div class="card-body mb-0 pb-1">
                                                <p class="mb-0 pb-2">@if($abt_text) {{$abt_text->top_text}} @endif</p>
                                                <p class="mb-0 pb-0">@if($abt_text) {{$abt_text->bottom_text}} @endif</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Frontend</a>
                                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Backend</a>
                                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Others</a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12 col-sm-8" id="abt_skill">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> <ul>
                                                                    <li><span>HTML5</span></li>
                                                                    <li><span>CSS3</span></li>
                                                                    <li><span>BOOTSTRAP4</span></li>
                                                                    <li><span>JAVASCRIPT</span></li>
                                                                    <li><span>JQUERY</span></li>
                                                                    <li><span>Vue</span></li>

                                                                </ul></div>
                                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">  <ul>
                                                                    <li><span>PHP</span></li>
                                                                    <li><span>AJAX</span></li>
                                                                    <li><span>MYSQL</span></li>
                                                                    <li><span>LARAVEL</span></li>

                                                                </ul></div>
                                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">                                                           <ul>
                                                                    <li><span>GIT</span></li>
                                                                    <li><span>GITHUB</span></li>
                                                                    <li><span>Adobe Photoshop</span></li>
                                                                </ul></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card" style="border: none">
                                                    <div class="card-body" style="padding: 5px;padding-top: 8px">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Phone</th>
                                                                <td><span>@if($site){{$site->phone}}@endif</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td><span>@if($site)
                                                                            <a href="mailto:{{$site->email}}">{{$site->email}}</a>
                                                                        @endif</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td><span>@if($site){{$site->address}}@endif</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Resume</th>
                                                                <td><a href="@if($site){{$site->resume}}@endif" class="btn btn-link">Resume Link</a></td>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- service-section -->
    <section id="service_section">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="sec_title wow animate__animated animate__zoomIn">
                        <h2 class="mb-0 pb-1">My Services</h2>
                        <p class="m-0 p-0">What i will serve for you!</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__lightSpeedInLeft">
                    <div class="service_box">
                        <div class="card" style="background: rgba(85, 230, 193, 0.3);border: none">
                            <div class="card-body">
                                <div class="img_box">
                                    <img src="{{asset('frontend')}}/resources/images/about/web-design.65e86a5.svg" alt="" class="img-fluid">
                                </div>
                                <h4>Web Design</h4>
                                <p>Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__pulse">
                    <div class="service_box">
                        <div class="card" style="background: rgba(254, 164, 127, 0.33);border: none">
                            <div class="card-body">
                                <div class="img_box">
                                    <img src="{{asset('frontend')}}/resources/images/about/web-development.3c47f06.svg" alt="" class="img-fluid">
                                </div>
                                <h4>Web Development</h4>
                                <p>Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3 wow animate__animated animate__lightSpeedInRight">
                    <div class="service_box">
                        <div class="card" style="background: rgba(85, 230, 193, 0.3);border: none">
                            <div class="card-body">
                                <div class="img_box">
                                    <img src="{{asset('frontend')}}/resources/images/about/wordpress.1a3cdb8.svg" alt="" class="img-fluid">
                                </div>
                                <h4>Wordpress Customization</h4>
                                <p>Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__lightSpeedInLeft">
                    <div class="service_box">
                        <div class="card" style="background: rgba(254, 164, 127, 0.33);border: none">
                            <div class="card-body">
                                <div class="img_box">
                                    <img src="{{asset('frontend')}}/resources/images/about/web-application.06a0196.svg" alt="" class="img-fluid">
                                </div>
                                <h4>Custom Codding</h4>
                                <p>Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__pulse">
                    <div class="service_box">
                        <div class="card" style="background: rgba(85, 230, 193, 0.3);border: none">
                            <div class="card-body">
                                <div class="img_box">
                                    <img src="{{asset('frontend')}}/resources/images/about/bug.png" alt="" class="img-fluid">
                                </div>
                                <h4>Bug Fixing</h4>
                                <p>Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__lightSpeedInRight">
                    <div class="service_box">
                        <div class="card" style="background: rgba(254, 164, 127, 0.33);border: none">
                            <div class="card-body">
                                <div class="img_box">
                                    <img src="{{asset('frontend')}}/resources/images/about/web-design.65e86a5.svg" alt="" class="img-fluid">
                                </div>
                                <h4>Graphic Design</h4>
                                <p>Professional and affordable web design service. I design website with your customer in mind using latest technology & modern design trends</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- portfolio-section -->
    <section id="portfolio_section">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="sec_title wow animate__animated animate__zoomIn">
                        <h2 class="mb-0 pb-1">My Portfolio</h2>
                        <p class="m-0 p-0">My Recent Work</p>
                    </div>
                </div>
            </div>

            <div id="portfolio">
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="card">
                                <div class="card-body">
                                    <div class="img_box text-center">
                                        <a href="{{asset($project->thumb_image)}}" class="popup"><img src="{{asset($project->image)}}" alt="" class="img-fluid"></a>
                                        <div class="img-content">
                                            <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">{{$project->category->name}}</i></h6>
                                            <h5>{{$project->title}}</h5>
                                            <a href="{{$project->live}}" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="{{route('projects.index')}}" class="btn btn-outline-info btn-lg border-gradinant">See More <i class="fa fa-link"></i></a>
            </div>
        </div>
    </section>

    <!-- programming_section -->
    <section id="programming_section">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="sec_title wow animate__animated animate__zoomIn">
                        <h2 class="mb-0 pb-1">My Programming Code</h2>
                        <p class="m-0 p-0">All Programming Code</p>
                    </div>
                </div>
            </div>
            <div class="programming-code mt-5 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-3 col-md-6">
                            <div class="code-box left-side">
                                <div class="code-box card">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        DS and Algorithm <i class="fa fa-angle-down ml-1"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                        <tr >
                                                            <th scope="col">SL</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">GitHub Link</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($ds_programming as $key => $item)
                                                            <tr>
                                                                <th scope="row">{{$key + 1 }}</th>
                                                                <td>{{$item->title}}</td>
                                                                <td><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="3"><span class="text-danger">Empty</span></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 col-md-6">
                            <div class="code-box right-side">
                                <div class="card">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="heading">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-info" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                                        Projects &amp; Development <i class="fa fa-angle-down ml-1"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse2" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">SL</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Github Link</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($other_programming as $key => $item)
                                                            <tr>
                                                                <th scope="row">{{$key + 1 }}</th>
                                                                <td>{{$item->title}}</td>
                                                                <td><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="3"><span class="text-danger">Empty</span></td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="photo_gallery" style="padding-bottom: 0px">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="sec_title wow animate__animated animate__zoomIn">
                        <h2 class="mb-0 pb-1">My Gallery</h2>
                        <p class="m-0 p-0">My Photo Gallery</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid-off mt-4" style="overflow: hidden;background: #111">
            <div class="gallery_photo">
                <div class="row no-gutters">
                    @foreach($gallery_images as $image)
                        <div class="col-12 col-md-3">
                            <div class="img-box">
                                <a data-fancybox="gallery" href="{{asset($image->image)}}" data-caption="{{$image->title}}">
                                    <img src="{{asset($image->image)}}" class="img-fluid"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- programming_section end -->

    <section id="counter_section" style="background: #245CD1;color: #fff;">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-md-3 mb-3">
                    <i class="far fa-smile-wink"></i>
                    <h3 class="count">155</h3>
                    <span>Happy Client</span>
                </div>

                <div class="col-12 col-md-3 mb-3">
                    <i class="fas fa-briefcase"></i>
                    <h3 class="count">1355</h3>
                    <span>Total Projects Done</span>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <i class="far fa-money-bill-alt"></i>
                    <h3 class="count">155</h3>
                    <span>Queue Projects</span>
                </div>
                <div class="col-12 col-md-3">
                    <i class="far fa-object-group"></i>
                    <h3 class="count">155</h3>
                    <span>Services</span>
                </div>
            </div>
        </div>
    </section>

    <section id="contact_section">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="sec_title wow animate__animated animate__zoomIn">
                        <h2 class="mb-0 pb-1">Contact Me
                        </h2>
                        <p class="m-0 p-0">I will be happy to help you. Fill out the form and I'll be in touch as soon as possible.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="contact">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-9">
                        <div class="bg" style="background: #2B62D5">
                            <div class="bg_content">
                                <div class="row">
                                    <div class="col-12 col-md-5" style="background: #245CD1">
                                        <div class="contact_media mt-4">
                                            <h5>Phone</h5>
                                            <span>@if($site){{$site->phone}}@endif</span>
                                        </div>
                                        <div class="contact_media">
                                            <h5>Email</h5>
                                            <span>@if($site){{$site->email}}@endif</span>
                                        </div>
                                        <div class="contact_media">
                                            <h5>Address</h5>
                                            <span>@if($site){{$site->address}}@endif</span>
                                        </div>
                                        <div class="socal_links">
                                            <ul>
                                                <li> <a href="@if($link){{$link->facebook}}@endif"><i class="fa fa-facebook"></i></a></li>
                                                <li> <a href="@if($link){{$link->twitter}}@endif"><i class="fa fa-twitter"></i></a></li>
                                                <li> <a href="@if($link){{$link->instagram}}@endif"><i class="fa fa-instagram"></i></a></li>
                                                <li> <a href="@if($link){{$link->linkedin}}@endif"><i class="fa fa-linkedin"></i></a></li>
                                                <li> <a href="@if($link){{$link->github}}@endif"><i class="fa fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7" style="background: #fff">
                                        <form id="contactFormHome" >
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="text" id="text" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group text-right">
                                                <input type="submit" class="btn btn-info" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('script')
<script>
    $('#contactFormHome').validate({
        rules: {
            name: {
                required: true
            },
            email :{
                required: true
            },
            subject :{
                required: true
            },
            text :{
                required: true
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        }
    });
</script>
<script>
    $('body').on('submit','#contactFormHome',function (e) {
        e.preventDefault();

        $.ajax({
            url : "{{route('contact.store')}}",
            method : 'POST',
            data : $(this).serialize(),
            success: function (response) {
                setSwalAlert('success','Success!',response.data);
                $('#name').val('');
                $('#email').val('');
                $('#subject').val('');
                $('#text').val('');
            }
        })
    })
</script>
@endpush



