<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($main_menu == 'Dashboard') active @endif">
        <a class="nav-link @if($main_menu == 'Dashboard') active @endif" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if($main_menu == 'Project') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sliders" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Project</span>
        </a>
        <div id="sliders" class="collapse @if($main_menu == 'Project') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($sub_menu == 'Category') active @endif" href="{{route('category.index')}}">Category</a>
                <a class="collapse-item @if($sub_menu == 'Project') active @endif" href="{{route('project.index')}}">Project</a>
                <a class="collapse-item @if($sub_menu == 'Programming') active @endif" href="{{route('programming.index')}}">Programming</a>
            </div>
        </div>
    </li>

    <li class="nav-item  @if($main_menu == 'About') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#About" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>About</span>
        </a>
        <div id="About" class="collapse  @if($main_menu == 'About') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($sub_menu == 'About_text') active @endif" href="{{route('about-text.index')}}">About Text</a>
                <a class="collapse-item @if($sub_menu == 'About_slider') active @endif" href="{{route('about-slider.index')}}">About Slider</a>
            </div>
        </div>
    </li>


    <li class="nav-item @if($main_menu == 'Site') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Site" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-globe"></i>
            <span>Site</span>
        </a>
        <div id="Site" class="collapse @if($main_menu == 'Site') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($sub_menu == 'Site_identity') active @endif" href="{{route('site-identity.index')}}">Site Identity</a>
                <a class="collapse-item @if($sub_menu == 'Social_link') active @endif" href="{{route('social-link.index')}}">Social Link</a>
                <a class="collapse-item @if($sub_menu == 'Gallery') active @endif" href="{{route('gallery.index')}}">Gallery</a>
            </div>
        </div>
    </li>

    <li class="nav-item @if($main_menu == 'Admin') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Admin" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-globe"></i>
            <span>Admin Panel</span>
        </a>
        <div id="Admin" class="collapse @if($main_menu == 'Admin') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($sub_menu == 'Manage_Admin') active @endif" href="{{route('admin.index')}}">Manage Admin</a>
                <a class="collapse-item @if($sub_menu == 'Social_link') active @endif" href="{{route('social-link.index')}}">Social Link</a>
                <a class="collapse-item @if($sub_menu == 'Gallery') active @endif" href="{{route('gallery.index')}}">Gallery</a>
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->