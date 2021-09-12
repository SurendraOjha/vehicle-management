<!doctype html>
<html lang="en">
<head>

<title> {{ $setting->system_name }} | @yield('title')</title>

{{-- include the links --}}

@include('layouts.links.css')

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body class="theme-cyan font-montserrat light_version">


@include('layouts.loader')

<!-- Theme Setting -->
<!--  -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="#">
                    {{-- <img src="{{asset('public/uploads/'.$setting->favicon)}}" --}}
                     alt="Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <!--  -->
            </div>

            <div class="navbar-right">

                <div id="navbar-menu">

                    <ul class="nav navbar-nav">
                        @include('layouts.user_info')


                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="icon-menu"><i class="icon-power"></i></a></li>
                        {{-- <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form> --}}
                    </ul>
                </div>



            </div>
        </div>
    </nav>
  {{--  <div class="search_div">
         <div class="card">
            <div class="body">
                <form id="navbar-search" class="navbar-form search-form">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i class="icon-close"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- search result -->
        {{-- @include('admin.layouts.search-result') -
    </div>
    --}}
    <!-- mega-menu -->
    {{-- @include('admin.layouts.mega-menu') --}}
    <!-- chat list tab -->

    {{-- @include('admin.layouts.chat_list') --}}
    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            {{-- <a href="#"><img src="{{asset('public/uploads/'.$setting->favicon)}}" alt="Logo" class="img-fluid logo"> --}}
            <span>{{ $setting->system_name }}</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <!-- welcome , username section -->
             <!--if user is superadmin then provide him all navlinks  -->
            @include('layouts.navbar')

        </div>
    </div>


     @yield('content')
</div>
<!-- Javascript -->
@include('layouts.links.js')


</body>
</html>
