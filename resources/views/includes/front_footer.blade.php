<!-- Link section -->
<section id="link_section" style="width: 100%">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-3 mb-3 ">
                <h4>Links</h4>
                <div class="links">
                    <ul>
                        <li><a href="{{url('/')}}"><i class="fa fa-square"></i> Home</a></li>
                        <li><a href=""><i class="fa fa-square"></i> About</a></li>
                        <li><a href=""><i class="fa fa-square"></i> Codes</a></li>
                        <li><a href=""><i class="fa fa-square"></i> Portfolio</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 mb-3">
                <h4>Follow Me</h4>
                <div class="links">
                    <ul>
                        <li><a href="@if($link){{$link->facebook}}@endif"><i class="fa fa-square"></i> Facebook</a></li>
                        <li><a href="@if($link){{$link->twitter}}@endif"><i class="fa fa-square"></i> Twitter</a></li>
                        <li><a href="@if($link){{$link->github}}@endif"><i class="fa fa-square"></i> Github</a></li>
                        <li><a href="@if($link){{$link->linkedin}}@endif"><i class="fa fa-square"></i> Linkedin</a></li>
                        <li><a href="@if($link){{$link->youtube}}@endif"><i class="fa fa-square"></i> Youtube</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3" >
                <h4>Resources</h4>
                <div class="links">
                    <ul>
                        <li><a href=""><i class="fa fa-square"></i> Blog</a></li>
                        <li><a href=""><i class="fa fa-square"></i> Codes</a></li>
                        <li><a href=""><i class="fa fa-square"></i> Free Tools</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 ">
                <h4>Hire Me</h4>
                <div class="links">
                    <ul>
                        <li><a href=""><i class="fa fa-square"></i> Fiverr Profile</a></li>
                        <li><a href=""><i class="fa fa-square"></i> Upwork Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="row text-center">
        <div class="col-12">
            <span>Design & Developed with <b>&hearts;</b> by <a href="@if($link){{$link->youtube}}@endif">Shahin</a></span>
        </div>
    </div>
</footer>