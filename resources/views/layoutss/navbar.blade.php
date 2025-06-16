<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="border-right: 0.5px solid #fff1f18c !important;">
    <a class="navbar-brand brand-logo mr-5"><img src="{{ asset('/images/logo.svg/') }}" alt="Image" style="max-width: 100px;" class="mr-2" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini"><img src="{{ asset('/images/logo.svg') }}" alt="logo" /></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-center justify-content-between" style="">

    @if (!in_array(request()->route()->getName(), ['exam', 'validate', 'instructions', 'exams', 'Candidate-Dashboard']))

    <style>
        .navbar-toggler-right .navbar-toggler {
            display: none !important;
        }

    </style>
    <button class="navbar-toggler navbar-toggler float-left" type="button" data-toggle="minimize">
        <span class="icon-menu" style="font-size: 30px;"></span>
    </button>


    <div class="text-center" style="margin:auto !important;">
        <h5 style="padding-top: 10px !important;margin-bottom:0px!important;">Welcome to SSA</h5>
    </div>

    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">

            <span class="count">
                <h3> @if(Auth::check()){{ ucfirst(Auth::user()->name) }}@endif<h3>
            </span>
            {{-- </a> --}}

        </li>
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" aria-expanded="false">
                <img src="{{ asset('images/faces/face1.jpg/') }}" alt="profile">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
                <a class="dropdown-item btn_logout">
                    <i class="ti-power-off text-primary"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
    @else
    <button class="navbar-toggler navbar-toggler float-left d-none" type="button" data-toggle="minimize">
        <span class="icon-menu" style="font-size: 30px;"></span>
    </button>
    <div class="text-center" style="padding: 0% 0% 0% 27%;">
        <h5 style="padding-top: 10px !important;">Welcome to SSA</h5>
        <p style="font-size: 14px; padding-top: 4px !important;">AI Enabled Virtual Examination System</p>
    </div>
    @endif

</div>
