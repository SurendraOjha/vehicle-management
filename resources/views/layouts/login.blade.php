<!doctype html>
<html lang="en">

<head>
<title>

@yield('title')
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('admin/login/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/login/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/login/css/vivify.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('admin/login/css/site.min.css')}}">

</head>
<body class="theme-cyan font-montserrat light_version">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

@yield('content')
<!-- END WRAPPER -->

<script src="{{asset('admin/login/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin//login/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('admin/login/js/mainscripts.bundle.js')}}"></script>
</body>
</html>
