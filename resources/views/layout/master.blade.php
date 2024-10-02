<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Invoice Managment</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/dist/img/favicon.png">
    <!--Global Styles(used by all pages)-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" >

    <link rel="stylesheet" href="{{asset('assets/plugins/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/typicons/src/typicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/themify-icons/themify-icons.min.css')}}">
    <!--Third party Styles(used by this page)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Start Your Custom Style Now-->
    <link rel="stylesheet" href="{{asset('assets/dist/css/style.css')}}">
</head>
<body class="fixed">
  <div class="wrapper">
     @include('layout.sidebar')
     <div class="content-wrapper">
         <div class="main-content">
     @include('layout.header')
     @if(session()->has('message'))
     <h2></h2>
     @endif
         @yield('content')
         </div>
        </div>
    </div>

<!--/.footer content-->
<footer class="footer-content">
    <div class="footer-text d-flex align-items-center justify-content-between">
        <div class="copy">Copyright @ 2022 All Rights Reserved.</div>
        <div class="credit">Login by: UaerName</div>
    </div>
</footer>

<!--Global script(used by all pages)-->

<script src="{{asset('assets/plugins/jQuery/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/dist/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/metisMenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>

<!-- Third Party Scripts(used by this page)-->
<script src="{{asset('assets/dist/js/popper.min.js')}}"></script>
<!--Page Active Scripts(used by this page)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--Page Scripts(used by all page)-->
<script src="{{asset('assets/dist/js/sidebar.js')}}"></script>
<script src="{{asset('assets/plugins/modals/modalEffects.js')}}"></script>
<script src="{{asset('assets/plugins/modals/classie.js')}}"></script>

</body>

</html>

