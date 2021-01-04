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
                                    <li><a href="https://www.facebook.com/sha.hin.9619934" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/Shahin85080084" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://github.com/AR-Shahin" target="_blank"><i class="fab fa-github"></i></a></li>
                                    <li><a href="https://stackoverflow.com/users/12926862/ar-shahin?tab=profile" target="_blank"><i class="fab fa-stack-overflow"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/anisur-rahaman-shahin-31295b186/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
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
                            <div class="single-slider-image">
                                <div class="img-box">
                                    <img src="{{asset('frontend')}}/resources/images/my/img.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="pos_content">
                                    <span>Southeast Uniersity</span>
                                </div>
                            </div>
                            <div class="single-slider-image">
                                <div class="img-box">
                                    <img src="{{asset('frontend')}}/resources/images/my/img2.JPG" alt="" class="img-fluid">
                                </div>
                                <div class="pos_content">
                                    <span>Southeast Uniersity</span>
                                </div>
                            </div>
                            <div class="single-slider-image">
                                <div class="img-box">
                                    <img src="{{asset('frontend')}}/resources/images/my/img4.JPG" alt="" class="img-fluid">
                                </div>
                                <div class="pos_content">
                                    <span>Southeast Uniersity</span>
                                </div>
                            </div>
                            <div class="single-slider-image">
                                <div class="img-box">
                                    <img src="{{asset('frontend')}}/resources/images/my/img3.JPG" alt="" class="img-fluid">
                                </div>
                                <div class="pos_content">
                                    <span>Programming Contest</span>
                                </div>
                            </div>
                            <div class="single-slider-image">
                                <div class="img-box">
                                    <img src="{{asset('frontend')}}/resources/images/my/img.png" alt="" class="img-fluid">
                                </div>
                                <div class="pos_content">
                                    <span>Chandpur</span>
                                </div>
                            </div>
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
                                                <p class="mb-0 pb-2">Hello.I'm Shahin.I'm a tech enthusiast guy. Personally I’m Optimistic and always in hurry kinda person.I'm a freelance web devoloper. I study CSE in South-East university.</p>
                                                <p class="mb-0 pb-0">I started my career as a Web Designer. After 1 years of consistently working in this field. It helped me gain lots of knowledge about business, marketing, and user experience too. I have tried a few more things to understand customer satisfaction, Business engagement & marketing including E-commerce business, Portfolio, Blogging, Youtube and etc. </p>
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
                                                                <td><span>+8801754100439</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td><span>mdshahinmije96@gmail.com</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td><span>Nikunju-2,Dhaka,Bangladesh</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Resume</th>
                                                                <td><a href="" class="btn btn-link">Resume Link</a></td>
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
                    <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center">
                                    <a href="{{asset('frontend')}}/resources/images/portfolio/a2z.png" class="popup"><img src="../public/frontend/resources/images/portfolio/port1.jpg" alt="" class="img-fluid"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">Wordpress Customizing</i></h6>
                                        <h5>E-commerce Website</h5>
                                        <a href="" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="1s">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center ">
                                    <a href="{{asset('frontend')}}/resources/images/portfolio/cosmatic_home.png" class="popup"><img src="{{asset('frontend')}}/resources/images/portfolio/port2.jpg" alt="" class="img-fluid"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">Wordpress Customizing</i></h6>
                                        <h5>E-commerce Website</h5>
                                        <a href="" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="1.25s">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center">
                                    <a href="{{asset('frontend')}}/resources/images/portfolio/port3.jpg" class="popup"><img src="{{asset('frontend')}}/resources/images/portfolio/port3.jpg" alt="" class="img-fluid"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">Wordpress Customizing</i></h6>
                                        <h5>E-commerce Website</h5>
                                        <a href="" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="1.25s">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center">
                                    <a href="{{asset('frontend')}}/resources/images/portfolio/hdx_home.png" class="popup"><img src="{{asset('frontend')}}/resources/images/portfolio/port4.jpg" alt="" class="img-fluid"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">Wordpress Customizing</i></h6>
                                        <h5>E-commerce Website</h5>
                                        <a href="" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="1.3s">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center">
                                    <a href="{{asset('frontend')}}/resources/images/portfolio/organic_home.png" class="popup"><img src="{{asset('frontend')}}/resources/images/portfolio/port5.jpg" alt="" class="img-fluid"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">Wordpress Customizing</i></h6>
                                        <h5>E-commerce Website</h5>
                                        <a href="" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 mb-4 wow animate__animated animate__fadeInUp" data-wow-delay="1.35s">
                        <div class="card">
                            <div class="card-body">
                                <div class="img_box text-center">
                                    <a href="{{asset('frontend')}}/resources/images/portfolio/port7.jpg" class="popup"><img src="{{asset('frontend')}}/resources/images/portfolio/port7.jpg" alt="" class="img-fluid"></a>
                                    <div class="img-content">
                                        <h6 class="mt-3"><i style="color: #6D214F;font-size: 14px">PSD to Bootstrap</i></h6>
                                        <h5>Single Page Website</h5>
                                        <a href="" class="btn btn-block btn-outline-info mt-1"><i class="fa fa-eye"></i> Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                            <th scope="col">Github Link</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Arraylist</td>
                                                            <td><a href="https://github.com/AR-Shahin/static_ArrayList" target="_blank">ArrayList</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Linklist</td>
                                                            <td><a href="https://github.com/AR-Shahin/Link_list" target="_blank">LinkList</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Stack</td>
                                                            <td><a href="https://github.com/AR-Shahin/Stack" target="_blank">Stack</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">4</th>
                                                            <td>Queue</td>
                                                            <td><a href="https://github.com/AR-Shahin/Queue" target="_blank">Queue</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">5</th>
                                                            <td>Tree</td>
                                                            <td><a href="https://github.com/AR-Shahin/Tree" target="_blank">Tree</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">6</th>
                                                            <td>Sorting Algorithm</td>
                                                            <td><a href="https://github.com/AR-Shahin/Tree" target="_blank">Sorting</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">7</th>
                                                            <td>Kaden's Algorithm</td>
                                                            <td><a href="https://github.com/AR-Shahin/Tree" target="_blank">Kaden's Algorithm</a></td>
                                                        </tr>
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
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Scroll_Top</td>
                                                            <td><a href="https://github.com/AR-Shahin/Scroll_Top" target="_blank">Scroll_Top</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>URI Online Judge</td>
                                                            <td><a href="https://github.com/AR-Shahin/URI_Online_Judge" target="_blank">URI Online Judge</a></td>
                                                        </tr>
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
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="{{asset('frontend')}}/resources/images/my/img.jpg" data-caption="Southeast University">
                                <img src="{{asset('frontend')}}/resources/images/my/img.jpg" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="{{asset('frontend')}}/resources/images/my/img.png" data-caption="Caption #2">
                                <img src="../public/frontend/resources/images/my/img.png" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="../public/frontend/resources/images/my/img2.JPG" data-caption="Caption #3">
                                <img src="../public/frontend/resources/images/my/img2.JPG" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="../public/frontend/resources/images/my/img3.JPG" data-caption="Caption #1">
                                <img src="../public/frontend/resources/images/my/img3.JPG" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="../public/frontend/resources/images/my/img4.JPG" data-caption="Caption #1">
                                <img src="../public/frontend/resources/images/my/img4.JPG" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="../public/frontend/resources/images/gallery/img1.jpg" data-caption="Caption #1">
                                <img src="../public/frontend/resources/images/gallery/img.jpg" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="../public/frontend/resources/images/gallery/img.jpg" data-caption="Caption #1">
                                <img src="../public/frontend/resources/images/gallery/img.jpg" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="img-box">
                            <a data-fancybox="gallery" href="../public/frontend/resources/images/gallery/img1.jpg" data-caption="Caption #1">
                                <img src="../public/frontend/resources/images/gallery/img.jpg" class="img-fluid"></a>
                        </div>
                    </div>
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
                                            <span>+7852363523</span>
                                        </div>
                                        <div class="contact_media">
                                            <h5>Email</h5>
                                            <span>mdshahinmije96@gmail.com</span>
                                        </div>
                                        <div class="contact_media">
                                            <h5>Address</h5>
                                            <span>Dhaka,Bangladesh</span>
                                        </div>
                                        <div class="socal_links">
                                            <ul>
                                                <li> <a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li> <a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li> <a href=""><i class="fa fa-instagram"></i></a></li>
                                                <li> <a href=""><i class="fa fa-linkedin"></i></a></li>
                                                <li> <a href=""><i class="fa fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7" style="background: #fff">
                                        <form action="">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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


