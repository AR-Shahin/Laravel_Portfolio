<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Anisur Rahaman Shahin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="Resources/Images/fav.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Front -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend')}}/resources/Fonts/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Plugin Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/resources/css/plugin/animated-headline.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/resources/css/plugin/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/resources/css/plugin/animate.css">
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="{{asset('/frontend')}}/resources/css/plugin/magnific-popup.css">
    <!-- End Plugin Css -->
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('/frontend')}}/resources/css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="{{asset('/frontend')}}/resources/css/responsive.css">
    @stack('css')
    <title>ShaHin | Portfolio | @yield('title','Home')</title>
</head>
<body>
<div class="wrapping" style="overflow: hidden;">
    <a href="#">
        <div class="scroll-top"><a href="#navBar"><i class="fas fa-angle-double-up"></i></a></div>
    </a><!-- scrolTop -->
    @include('includes.front_navbar')

    @yield('main_content')

    @include('includes.front_footer')

</div> <!-- wrapping -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Plugin JS -->
<script src="{{asset('frontend')}}/resources/js/wow.min.js"></script>
<script src="{{asset('frontend')}}/resources/js/plugin/particles.min.js"></script>
<script src="{{asset('frontend')}}/resources/js/plugin/app.js"></script>
<script src="{{asset('frontend')}}/resources/js/plugin/animated-headline.js"></script>
<script src="{{asset('frontend')}}/resources/js/plugin/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/resources/js/plugin/wow.min.js"></script>
<script src="{{asset('frontend')}}/resources/js/plugin/jquery.magnific-popup.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- End Plugin JS -->
<script src="{{asset('frontend')}}/resources/js/main.js"></script>
<script src="{{asset('asset/ajax.js')}}"></script>
@stack('script')
<script>
    $('.scroll-top').click(function(){
        $('html,body').animate({
            scrollTop : 0
        }),100;
    });
    $('.scroll-top').hide();
    $(window).scroll(function(){
        var count = $(this).scrollTop();

        if(count < 100){
            $('.scroll-top').fadeOut(100)
        }
        else{
            $('.scroll-top').fadeIn(100);
            ;
        }
    });
</script>
</body>
</html>
